<? only_admin_access(); ?>



<script>
    mw.require('forms.js',true);
	
	
	 mw.on.hashParam('search', function(){


  var field = mwd.getElementById('mw-search-field');

  if(!field.focused){ field.value = this; }

  if(this  != ''){
    $('#mw-admin-manage-orders-list').attr('keyword',this);
  } else {
    $('#mw-admin-manage-orders-list').removeAttr('keyword' );
  }

  $('#mw-admin-manage-orders-list').removeAttr('export_to_excel');


 mw.reload_module('#mw-admin-manage-orders-list', function(){
    mw.$("#mw-search-field").removeClass('loading');
 });


});
</script>

         <? $is_orders = get_orders('count=1');


            ?>
<div class="mw-table-sorting-controller" style="width: 960px;">

<h2 class="mw-side-main-title left" style="padding-top: 0"><span class="ico iorder-big"></span><span><?php _e("Orders List"); ?></span></h2>
<?php  if($is_orders != 0){    ?>
<div class="mw-table-sorting right">
    <label>Sort By:</label>
    <ul class="unselectable">
      <li><span data-sort-type="created_on" onclick="mw.tools.sort({id:'shop-orders', el:this});">Date</span></li>
      <li><span data-sort-type="first_name" onclick="mw.tools.sort({id:'shop-orders', el:this});">Name(A-Z)</span></li>
      <li><span data-sort-type="amount" onclick="mw.tools.sort({id:'shop-orders', el:this});">Ammout</span></li>
    </ul>
  </div>

  <input
  style="width: 230px;margin-right: 30px;"
  type="text"
  onblur="mw.form.dstatic(event);"
  onfocus="mw.form.dstatic(event);"
  id="mw-search-field"
  class="mw-ui-searchfield right"
  value="<?php _e("Search for orders"); ?>"
  data-default="<?php _e("Search for orders"); ?>"
  onkeyup="mw.form.dstatic(event);mw.on.stopWriting(this, function(){mw.url.windowHashParam('search', this.value)});"
   />
        <?php  } ?>
</div>
<module type="shop/orders"  id="mw-admin-manage-orders-list"  />






