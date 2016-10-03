<?php
/**
 * 百度统计插件
 *
 * @package BaiduTongji
 * @author linjun
 * @version 1.0.0
 * @link http://www.simplest.tech/
 */
class BaiduTongji_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->footer = array('BaiduTongji_Plugin', 'render');
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}

    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        /** 分类名称 */
        $baiduAccount = new Typecho_Widget_Helper_Form_Element_Text('baiduAccount', NULL, '百度统计帐号', _t('百度统计帐号'), _t('此帐号可在百度统计管理平台获取代码中提取；位于hm.baidu.com/hm.js?后那串字符。'));
        $form->addInput($baiduAccount);
    }

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    /**
     * 插件实现方法
     *
     * @access public
     * @return void
     */
     public static function render()
     {
         $baiduAccount = Typecho_Widget::widget('Widget_Options')->plugin('BaiduTongji')->baiduAccount;
         if ($baiduAccount) {
           echo "<script type=\"text/javascript\"><script type=\"text/javascript\">var _hmt=_hmt||[];(function(){var b=document.createElement(\"script\");b.src=\"//hm.baidu.com/hm.js?\"+\"$baiduAccount\";var a=document.getElementsByTagName(\"script\")[0];a.parentNode.insertBefore(b,a)})();</script>";
         }
     }
}
