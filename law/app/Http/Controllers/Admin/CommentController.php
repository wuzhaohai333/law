<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
class CommentController extends CommController
{
    //评论列表
    public function commentList(){
        $data=DB::table('law_comment')->where('comment_status','<',3)->simplePaginate(2);
        foreach($data as $k=>$v){
            $data[$k]->comment_ctime=date('Y-m-d H:i:s',$v->comment_ctime);
            if(!empty($v->comment_utime)){
                $data[$k]->comment_utime=date('Y-m-d H:i:s',$v->comment_utime);
            }
        }
        return view('admin.commentList',['title'=>'评论列表','data'=>$data]);
    }
    //选取删除 标杆用户
    public function commentSightcing(){
        $type=Input::get('type');
        $comment_id=Input::get('comment_id');
        $status=Input::get('status');
        $where=[
            'comment_id'=>$comment_id
        ];
        $up_where=[
            'is_sightcing'=>1
        ];
        if($status=='user'){
            $up_where['comment_status']=1;
        }else{
            $up_where['comment_status']=2;
        }
        if($type==1){
            DB::table('law_comment')->where($up_where)->update(['is_sightcing'=>0]);
            $res=DB::table('law_comment')->where($where)->update(['is_sightcing'=>1]);
            if($res){
                echo 1;
            }else{
                echo 2;
            }
        }else{
            $res=DB::table('law_comment')->where(['comment_id'=>$comment_id])->update(['is_sightcing'=>0]);
            if($res){
                echo 1;
            }else{
                echo 2;
            }
        }
    }
    //选取幸运用户
    public function commentGood(){
        $type=Input::get('type');
        $comment_id=Input::get('comment_id');
        $where=[
            'comment_id'=>$comment_id
        ];
        if($type==1){
            DB::table('law_comment')->where(['is_good'=>1])->update(['is_good'=>0]);
            $res=DB::table('law_comment')->where($where)->update(['is_good'=>1]);
            if($res){
                echo 1;
            }else{
                echo 2;
            }
        }else{
            $res=DB::table('law_comment')->where(['is_good'=>1])->update(['is_good'=>0]);
            if($res){
                echo 1;
            }else{
                echo 2;
            }
        }
    }
    //删除评论
    public function commentDelete(){
        $comment_id=Input::get('comment_id');
        $where=[
            'comment_id'=>$comment_id
        ];
        $res=DB::table('law_comment')->where($where)->delete();
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
}
