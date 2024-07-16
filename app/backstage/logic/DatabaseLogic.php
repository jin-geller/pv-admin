<?php
// +----------------------------------------------------------------------
// | PvAdmin Administrative Backend ( PHP + Vue )
// +----------------------------------------------------------------------
// | Copyright © 2024-present www.pvadmin.cn All Rights Reserved
// +----------------------------------------------------------------------
// | License: MIT License ( https://mit-license.org )
// +----------------------------------------------------------------------
// | Author: PvAdmin Team
// +----------------------------------------------------------------------
declare (strict_types=1);

namespace app\backstage\logic;

use pv\basic\BaseLogic;
use pv\utils\Backup;
use think\Exception;
use think\response\Json;

class DatabaseLogic extends BaseLogic
{
    /**
     * @notes 数据库操作类
     * @var Backup
     */
    protected Backup $dbBackup;

    /**
     * @notes constructor
     * @param Backup $backup
     */
    public function __construct(Backup $backup){
        $this->dbBackup= $backup;
    }

    /**
     * @notes 列表
     * @param string|null $table
     * @return Json
     */
    public function list(string $table=null): Json
    {
        $list=$this->dbBackup->dataList($table);
        $count=count($list);
        return resultJson(compact('list', 'count'));
    }

    /**
     * @notes 备份表
     * @param $tables
     * @return Json
     */
    public function backup($tables): Json
    {
        $data = '';
        ini_set ("memory_limit","-1");
        foreach ($tables as $t) {
            $res = $this->dbBackup->backup($t, 0);
            if (!$res && $res != 0) {
                $data .= $t . '|';
            }
        }
        return resultJson($data);
    }

    /**
     * @notes 优化表
     * @param $tables
     * @return Json
     * @throws Exception
     */
    public function optimize($tables): Json
    {
        $res=$this->dbBackup->optimize($tables);
        return resultJson($res,$res?1:0);
    }

    /**
     * @notes 修复表
     * @param mixed $tables
     * @return Json
     * @throws Exception
     */
    public function repair(mixed $tables): Json
    {
        foreach ($tables as $item){
            if(strtolower($item['engine'])=='innodb'){
                return resultJson("The storage engine for the table doesn't support repair",0);
            }
        }
        $res=$this->dbBackup->repair($tables);
        return resultJson($res,$res?1:0);
    }

    /**
     * @notes 备份列表
     * @return Json
     */
    public function fileList(): Json
    {
        $list=array_values($this->dbBackup->fileList());
        $count=count($list);
        return resultJson(compact('list','count'));
    }

    /**
     * @notes 删除备份文件
     * @param $time
     * @return Json
     * @throws Exception
     */
    public function fileDel($time): Json
    {
        $this->dbBackup->delFile($time);
        return resultJson();
    }

    /**
     * @notes 下载备份文件
     * @param $time
     * @return void
     * @throws Exception
     */
    public function fileDownload($time): void
    {
        $this->dbBackup->downloadFile(intval($time));
    }

    /**
     * @notes 导入备份文件
     * @param $param
     * @return Json
     * @throws Exception
     */
    public function fileImport($param): Json
    {
        [$time,$part,$start]=[$param['time']??0,$param['part']??0,$param['start']??0];
        $time = (int) $time;
        if (is_null($start)) {
            $list = $this->dbBackup->getFile('timeverif', $time);
            if (is_array($list)) {
                session('backup_list', $list);
                return resultJson(['msg'=>'初始化完成，开始还原...','data'=>['part' => 1, 'start' => 0, 'time' => $time]]);
            } else {
                return resultJson('备份文件可能已经损坏,请检查',0);
            }
        } else if (is_numeric($part) && is_numeric($start)) {
            $list=session('backup_list');
            $part = (int) $part;
            $start = (int) $start;
            $start = $this->dbBackup->setFile($list)->import($start, $time, $part);
            if (false === $start) {
                return resultJson('还原数据出错,请重试',0);
            } elseif (0 === $start) {
                if (isset($list[++$part])) {
                    return resultJson(["msg"=>"正在还原...卷{$part}，请勿关闭当前页面", 'data'=>['part' => $part, 'start' => 0, 'time' => $time]]);
                } else {
                    session('backup_list',null);
                    return resultJson('还原数据成功');
                }
            } else {
                $data = array('part' => $part, 'start' => $start[0], 'time' => $time);
                if ($start[1]) {
                    $rate = floor(100 * ($start[0] / $start[1]));
                    return resultJson(["msg"=>"正在还原...卷{$part} ({$rate}%)，请勿关闭当前页面", 'data'=>$data]);
                } else {
                    $data['gz'] = 1;
                    return resultJson(["msg"=>"正在还原...卷{$part}，请勿关闭当前页面", 'data'=>$data]);
                }
            }
        } else {
            return resultJson("参数错误！",0);
        }
    }
}
