(function($){
    /**
 * $.fn.extend({
 *         test:function(){
 *             alert($(this).attr("te"));
 *              
 *         }
 *     });
 *     $.extend({
 *         test:function(){
 *             alert("11111");
 *         }
 *     });
 *     
 */
 /**$.命名空间.方法(将minv和maxv封装进了自定义对象MyExtend中)
 *    $.MyExtend = {
 *         minv:function(a,b){
 *           return a<b?a:b;  
 *         },
 *         maxv:function(a,b){
 *             return a<b?b:a;
 *         }
 *     }
 */
 /**自定义jquery命令   
 * $.fn.extend({
 *     getidok:function(){
 *         return $(this).attr("id");
 *     }
 *  });
 */
/**
 *  $.fn.getidok2=function(){
 *          return $(this).attr("id");
 *  }
 */
 
 /**遍历 所有节点 的 jquery对象方法
 * $.fn.tellname = function(){
 *     return $(this).each(function(){
 *        alert(this.nodeName); 
 *     });
 *  }
 */
 /**改变字段背景及当前色插件    未优化
 * $.extend($.fn,{
 *     color:function(options){
 *         var options = $.extend({
 *             bcolor:"white",
 *             fcolor:"black"
 *             },options);
 *             return this.each(function(){
 *               $(this).css("color",options.fcolor);
 *               $(this).css("backgroundColor",options.bcolor);  
 *             })
 *     }
 *  })
 */
/**
 *  $.extend($.fn,{
 *         color:function(options){
 *             var options = $.extend({},$.fn.color.defaults,options);
 *             return this.each(function(){
 *                 $(this).css("color",options.fcolor);
 *                 $(this).css("backgroundColor",options.bcolor);
 *             })
 *         }
 *  })
 *    //预设默认前景色和背景色
 *  $.fn.color.defaults={
 *     bcolor:"white",
 *     fcolor:"red"
 *     }
 *     
 */
/**
 *  $.extend($.fn,{
 *     color:function(options){
 *         var options = $.extend({},$.fn.color.defaults,options);
 *         return $(this).each(function(){
 *             $(this).css("color",options.fcolor);
 *             $(this).css("backgroundColor",options.bcolor);
 *             var _html = $(this).html();
 *             _html = $.fn.color.format(_html);
 *             $(this).html(_html);
 *         })
 *     }
 *  })
 *  
 *  $.fn.color.defaults = {
 *     fcolor:"red",
 *     bcolor:"yellow"
 *  };
 *  $.fn.color.format=function(str){
 *     return str;
 *  };
 */
 $.extend($.fn,{
    color:function(options){
        var options = $.extend({},$.fn.color.defaults,options);
        return $(this).each(function(){
            $(this).css("color",options.fcolor);
            $(this).css("backgroundColor",options.bcolor);
            var _f = $(this).html();
            _f = $.fn.color.format(_f);
            $(this).html(_f);
            
        })
        
        
    }
    
    
 })
 
 $.fn.color.defaults={
    fcolor : "green",
    bcolor : "yellow"
 }
 $.fn.color.format = function(str){
    return str;
 }
 })(jQuery);
 
