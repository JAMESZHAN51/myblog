<?php

namespace app\admin\controller;

use think\Controller;

class Comment extends Controller
{
    //评论列表
    public function all()
    {
            $comments = model('Comment')->with('article,member')->order('create_time','desc')->paginate(5);
        $viewData = [
            'comments' => $comments
        ];
        $this->assign($viewData);
        return view();
    }

    //评论删除
    public function del()
    {
        $contentInfo = model('Comment')->find(input('post.id'));
        $result = $contentInfo->delete();
        if ($result){
            $this->success('删除成功!','admin/comment/all');
        }else{
            $this->error('删除失败!');
        }
    }
}
