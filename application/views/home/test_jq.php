test
<div id="myd" te="kkkk"></div>

<input type="button" id="mybtu" value="click"/>

<ul id="myul">
    <input />
</ul>
<label class="mylady">ok,my lady.</label>
<label class="mylady">ok,my lady.</label>
<label class="mylady">ok,my lady.</label>
<label class="mylady">ok,my lady.</label>
<script type="text/javascript">


//$("#myd").test();
//$.test();
/**根据输入返回最大最小的事例   $.命名空间.方法(将minv和maxv封装进了自定义对象MyExtend中)
 * $("#mybtu").bind("click",function(){
 *    var a =  prompt("输入a");
 *    var b = prompt("输入b");
 *    var c=$.MyExtend.minv(a,b);
 *    var d =$.MyExtend.maxv(a,b);
 *    alert("最大是"+d+"最小是"+c); 
 * });
 */
/** 通过$.fn.extend()扩展的方法
 * alert($("#mybtu").getidok());
 */
/**通过$.fn.getidok2=function(){ 扩展的方法
 *  alert($("#mybtu").getidok2());
 */
/** 调用遍历 所有节点 的 jquery对象方法
 *  $("body *").tellname().html(2323232323232).hide(4000);
 */
 $.fn.color.defaults = {
    bcolor:"green",
    fcolor:"red"
 }
 $.fn.color.format=function(str){
    return "<b>"+str+"</b>";
 }
 $(".mylady").color();
</script>

</body>
</html>
