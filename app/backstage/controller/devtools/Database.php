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
namespace app\backstage\controller\devtools;

use app\backstage\logic\DatabaseLogic;
use pv\basic\BaseController;
use think\Exception;
use think\response\Json;

class Database extends BaseController
{

    /**
     * @notes constructor
     * @param DatabaseLogic $logic
     */
    public function __construct(DatabaseLogic $logic){
        parent::__construct();
        $this->logic= $logic;
    }

    /**
     * @note 列表
     * @return Json
     */
    public function list(): Json
    {
        $table = $this->request->param('table');
        return $this->logic->list($table?:null);
    }

    /**
     * @notes 备份
     * @return Json
     */
    public function  backup(): Json
    {
        $tables=$this->request->param('tables');
        return $this->logic->backup($tables);
    }

    /**
     * @notes 优化
     * @return Json
     * @throws Exception
     */
    public function  optimize(): Json
    {
        $tables=$this->request->param('tables');
        return $this->logic->optimize($tables);
    }

    /**
     * @notes 修复
     * @return Json
     * @throws Exception
     */
    public function  repair(): Json
    {
        $param=$this->request->param('tables');
        return $this->logic->repair($param);
    }

    /**
     * @notes 备份列表
     * @return Json
     */
    public function fileList(): Json
    {
        return $this->logic->fileList();
    }

    /**
     * @notes 删除备份文件
     * @return Json
     * @throws Exception
     */
    public function fileDel(): Json
    {
        return $this->logic->fileDel($this->request->param('time'));
    }

    /**
     * @notes 下载备份文件
     */
    public function fileDownload(): void
    {
        $this->logic->fileDownload($this->request->param('time'));
    }

    /**
     * @notes 导入备份文件
     */
    public function fileImport(): Json
    {
        return $this->logic->fileImport($this->request->param());
    }
}