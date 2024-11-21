<?php
/*
Plugin Name:Adding New Product
Description:This plugin is for adding new product  
*/

function cmb_add_meta_box() {

add_meta_box('custom_post_metabox','Add new Product','product_add_box','product','normal','high');

}

add_action( 'add_meta_boxes', 'cmb_add_meta_box' );

function product_add_box($post_id){	 
$curent_cat_id = get_the_terms( $post_id,'product_cat' );
$get_only_cat = get_the_terms( $post_id,'product_cat' );
$arr_cat_id = array();


    $woocCategoryTerms = get_terms('product_cat', array(
        'order'        => 'ASC',  // (boolean) 
        'parent'       => 0,     // (integer) Get direct children of this term (only terms whose explicit parent is this value). If 0 is passed, only top-level terms are returned. Default is an empty string.
        'hierarchical' => true,  // (boolean) Whether to include terms that have non-empty descendants (even if 'hide_empty' is set to true).
        ));    


?>		
<div class="custom_pro_fieldd"> 
<label><strong>Product title</strong></label>
<input type="text" name="pro_title" class="product_title_new">
<label><strong>Product Sku</strong></label>
<input type="text" name="pro_sku" class="product_sku">
</div>
<div class="pro_dupli_action">
<label><strong>Product duplication method</strong></label>
<p><input type="radio" name="manual_sel" value="manual">Manual
<input type="radio" name="manual_sel" value="automatic" class="autom_sel">Automatic</p>

<?php
$searchcat_arr = array();
$women_cat=array();
$arr_men_id = array();
$get_all_checked1=array();
$errormsg = array();
$all_unmatch = array();
$women_cat_name = array();
$kids_cat_name1 = array();
$erro_unmatch=array();
$erro_unmatch1=array();
$new_chekedcat=array();
foreach($get_only_cat as $get_only_cat1){
$serch_cat = $get_only_cat1->term_id;
$searchcat_arr[]=$serch_cat;	
} 
if(in_array("951", $searchcat_arr))
{?>
<select name="women_sele_input" class="women_input_drop">
<option value="">--Select category--</option>
<option value="women">Women</option>
<option value="kids">Kids</option>
</select>	
<?php }
foreach($curent_cat_id as $curent_cat_id2){
$curent_cat_name = $curent_cat_id2->name;
$arr_cat_id[]=$curent_cat_id2->term_id;
$cat_new_id = $curent_cat_id2->term_id;	
}?>
</div>
<?php
$product_idd = get_the_id();
	 $curent_cat_id = get_the_terms( $product_idd,'product_cat' );
     $catss = get_categories( array( 
        'child_of'   => 951,
        'taxonomy'   => 'product_cat',
        'hide_empty' => false
    ) );

	$chi_term_ar=array();
	foreach($catss as $catss4){	
	$chi_term_ar12=$catss4->term_id;
	$chi_term_ar[]=$catss4->term_id;
	}
$checked_ids=array();	
foreach($curent_cat_id as $curent_cat_id9){
	$checked_ids[] = $curent_cat_id9->term_id;
}	
 
foreach($chi_term_ar as $chi_term_ar2){
$term_cat = get_term_by('term_id', $chi_term_ar2, 'product_cat'); 
$term_idd_get = $term_cat->term_id;
if(in_array($term_idd_get, $checked_ids))
{
	$new_chekedcat[]=$term_idd_get;
}
else{
}

}
foreach($new_chekedcat as $term_idd_get2){
$term_category = get_term_by('term_id', $term_idd_get2, 'product_cat'); 	
$category_slug = $term_category->slug;
$category_namee = $term_category->name;
if($category_slug == "casual-men"){
$women_cat_name[]="1038";
}
elseif($category_slug == "footwear-casual-men"){
$erro_unmatch[]="$category_namee not matched";
}
elseif($category_slug == "hoodies-casual-men"){
$women_cat_name[]="1039";
}
elseif($category_slug == "jackets-coats-casual-men"){
$erro_unmatch[]="$category_namee not matched";	
}
elseif($category_slug == "joggers"){
$women_name[]="1102";
}
elseif($category_slug == "shorts-casual-men"){
$erro_unmatch[]="$category_namee not matched";	
}
elseif($category_slug == "t-shirts-casual-men"){
$women_cat_name[]="1103";
}
elseif($category_slug == "vests-tanks"){
$erro_unmatch[]="$category_namee not matched";	
}
elseif($category_slug == "protection-men"){
$women_cat_name[]="956";
}
elseif($category_slug == "anklets-ankle-support"){
$women_cat_name[]="1046";
}
elseif($category_slug == "body-protectors"){
$erro_unmatch[]="$category_namee not matched";	
}
elseif($category_slug == "boxing-gloves-protection-men"){
$women_cat_name[]="1003";
}
elseif($category_slug == "ear-guards-protection-men"){
$erro_unmatch[]="$category_namee not matched";	
}
elseif($category_slug == "groin-guards-protection-men"){
$erro_unmatch[]="$category_namee not matched";	
}
elseif($category_slug == "hand-wraps-protection-men"){
$women_cat_name[]="1023";
}
elseif($category_slug == "head-guards-protection-men"){
$women_cat_name[]="1001";
}
elseif($category_slug == "knee-elbow-pads"){
$women_cat_name[]="1065";
}
elseif($category_slug == "mma-gloves-protection-men"){
$women_cat_name[]="1071";
}
elseif($category_slug == "mouth-guards-protection-men"){
$women_cat_name[]="957";
}
elseif($category_slug == "shin-guards-protection-men"){
$women_cat_name[]="996";
}
elseif($category_slug == "boots-shoes"){
$women_cat_name[]="1050";
}
elseif($category_slug == "boxing-shorts"){
$women_cat_name[]="1030";
}
elseif($category_slug == "mma-compression-shorts"){
$erro_unmatch[]="$category_namee not matched";	
}
elseif($category_slug == "footwear-training"){
$erro_unmatch[]="$category_namee not matched";	
}
elseif($category_slug == "muay-thai-shorts"){
$women_cat_name[]="1191";
}
elseif($category_slug == "rash-guards-training"){
$women_cat_name[]="1040";
}
elseif($category_slug == "spats-leggings"){
$women_cat_name[]="1027";
}
elseif($category_slug == "sweat-suits"){
$erro_unmatch[]="$category_namee not matched";	
}
elseif($category_slug == "training-tops"){
$women_cat_name[]="1142";
}
elseif($category_slug == "wrestling-boots-shoes"){
$women_cat_name[]="1207";
}
elseif($category_slug == "uniforms"){
$women_cat_name[]="991";
}
elseif($category_slug == "bjj-gi"){
$women_cat_name[]="1016";
}
elseif($category_slug == "kickboxing"){
$women_cat_name[]="1171";
}

}
?>
<div class="women_not_match">
<?php
foreach($erro_unmatch as $erro_unmatch){
	?>
	<p><?php echo $erro_unmatch;?></p>
	<?php
}
?>
</div>



<?php
$product_idd1 = get_the_id();
	 $curent_cat_id1 = get_the_terms( $product_idd1,'product_cat' );
     $cat_get = get_categories( array( 
        'child_of'   => 951,
        'taxonomy'   => 'product_cat',
        'hide_empty' => false
    ) );

	$chi_term_ar1=array();
	foreach($cat_get as $cat_get2){	
	$chi_term_ar1[]=$cat_get2->term_id;
	}
$checked_ids1=array();	
foreach($curent_cat_id1 as $curent_cat_id9){
	$checked_ids1[] = $curent_cat_id9->term_id;
}	
 
foreach($chi_term_ar1 as $chi_term_ar2){
$term_cat1 = get_term_by('term_id', $chi_term_ar2, 'product_cat'); 
$term_idd_get1 = $term_cat1->term_id;
if(in_array($term_idd_get1, $checked_ids1))
{
	$new_chekedcat1[]=$term_idd_get1;
}
else{
}

}
foreach($new_chekedcat1 as $new_chekedcat2){
$term_category1 = get_term_by('term_id', $new_chekedcat2, 'product_cat'); 	
$category_slug1 = $term_category1->slug;
$category_namee1 = $term_category1->name;
if($category_slug1 == "casual-men"){
$erro_unmatch1[]="$category_namee1 not matched";
}  
elseif($category_slug1 == "footwear-casual-men"){
$erro_unmatch1[]="$category_namee1 not matched";
}
elseif($category_slug1 == "hoodies-casual-men"){
$kids_cat_name1[]="1125";
}
elseif($category_slug1 == "jackets-coats-casual-men"){
$erro_unmatch1[]="$category_namee1 not matched";	
}
elseif($category_slug1 == "joggers"){
$erro_unmatch1[]="$category_namee1 not matched";	
}
elseif($category_slug1 == "shorts-casual-men"){
$erro_unmatch1[]="$category_namee1 not matched";	
}
elseif($category_slug1 == "t-shirts-casual-men"){
$kids_cat_name1[]="1075";
}
elseif($category_slug1 == "vests-tanks"){
$erro_unmatch1[]="$category_namee1 not matched";	
}
elseif($category_slug1 == "protection-men"){
$kids_cat_name1[]="958";
}
elseif($category_slug1 == "anklets-ankle-support"){
$erro_unmatch1[]="$category_namee1 not matched";
}
elseif($category_slug1 == "body-protectors"){
$kids_cat_name1[]="1053";
}
elseif($category_slug1 == "boxing-gloves-protection-men"){
$kids_cat_name1[]="1048";
}
elseif($category_slug1 == "ear-guards-protection-men"){
$erro_unmatch1[]="$category_namee1 not matched";	
}
elseif($category_slug1 == "groin-guards-protection-men"){
$kids_cat_name1[]="1060";	
}
elseif($category_slug1 == "hand-wraps-protection-men"){
$kids_cat_name1[]="1024";
}
elseif($category_slug1 == "head-guards-protection-men"){
$kids_cat_name1[]="1128	";
}
elseif($category_slug1 == "knee-elbow-pads"){
$kids_cat_name1[]="1163";
}
elseif($category_slug1 == "mma-gloves-protection-men"){
$kids_cat_name1[]="1096";
}
elseif($category_slug1 == "mouth-guards-protection-men"){
$kids_cat_name1[]="959";
}
elseif($category_slug1 == "shin-guards-protection-men"){
$kids_cat_name1[]="1054";
}
elseif($category_slug1 == "boots-shoes"){
$erro_unmatch1[]="$category_namee1 not matched";		
}
elseif($category_slug1 == "boxing-shorts"){
$erro_unmatch1[]="$category_namee1 not matched";		
}
elseif($category_slug1 == "mma-compression-shorts"){
$erro_unmatch1[]="$category_namee1 not matched";	
}
elseif($category_slug1 == "footwear-training"){	
$erro_unmatch1[]="$category_namee1 not matched";	
}
elseif($category_slug1 == "muay-thai-shorts"){
$erro_unmatch1[]="$category_namee1 not matched";	
}
elseif($category_slug1 == "rash-guards-training"){
$erro_unmatch1[]="$category_namee1 not matched";	
}
elseif($category_slug1 == "spats-leggings"){
$erro_unmatch1[]="$category_namee1 not matched";	
}
elseif($category_slug1 == "sweat-suits"){	
$erro_unmatch1[]="$category_namee1 not matched";	
}
elseif($category_slug1 == "training-tops"){
$erro_unmatch1[]="$category_namee1 not matched";	
}
elseif($category_slug1 == "wrestling-boots-shoes"){
$erro_unmatch1[]="$category_namee1 not matched";	
}
elseif($category_slug1 == "uniforms"){
$women_cat_name1[]="1017";
}
elseif($category_slug1 == "bjj-gi"){
$women_cat_name1[]="1018";
}
elseif($category_slug1 == "kickboxing"){
$women_cat_name1[]="1164";
}

}
?>
<div class="kids_not_match">
<?php
foreach($erro_unmatch1 as $erro_unmatch2){
	?>
	<p><?php echo $erro_unmatch2;?></p>
	<?php
}
?>
</div>



<div class="product_duplicate_secs">
<?php
    foreach($woocCategoryTerms as $wooCategoryTerm) : 
	$main_cat_idds = $wooCategoryTerm->term_id;
?>
        <ul class="main_category_sec">
            <li class="">
<input type="checkbox" name="getcategory_checked[]" value="<?php echo $wooCategoryTerm->term_id?>" <?php if (in_array($main_cat_idds, $arr_cat_id)){ ?> checked="checked" <?php } ?>><?php echo $wooCategoryTerm -> name;
				?>
                <ul class="wsubcategs">
                    <?php
                        $wooSubArgs = array(
                            'hierarchical' => true,
                            'hide_empty' => false,
                            'parent' => $wooCategoryTerm -> term_id,
                            'taxonomy' => 'product_cat'
                        );

                        $wooSubCategories = get_categories($wooSubArgs);

                        foreach ($wooSubCategories as $wooSubCategory):
                    $term_idd = $wooSubCategory-> term_id;
					$cat_name_new = $wooSubCategory->name;
					?>
                            <li class="main_cat_li">
							<input type="checkbox" name="getcategory_checked[]" value="<?php echo $term_idd;?>" <?php if (in_array($term_idd, $arr_cat_id)){ ?> checked="checked" <?php } ?>><?php echo $cat_name_new;?>
                            </li>
							
							
							<ul class="sub_child_last">
                            <?php
							$wooSubArgs1 = array(
                            'hierarchical' => true,
                            'hide_empty' => false,
                            'parent' => $term_idd,
                            'taxonomy' => 'product_cat'
                        );
						$wooSubCategories1 = get_categories($wooSubArgs1);	
						foreach($wooSubCategories1 as $wooSubCategories22){
						$new_cat_id = $wooSubCategories22->term_id;	
						$sub_cat_name = $wooSubCategories22->name;	
						?>
						<li>
						<input type="checkbox" name="getcategory_checked[]" value="<?php echo $new_cat_id;?>" <?php if (in_array($new_cat_id, $arr_cat_id)){ ?> checked="checked" <?php } ?>><?php echo $sub_cat_name;?>
         		
                         </li>	
						<?php	
						}	
						echo"</ul>";
                        endforeach;
                            ?>  
                </ul>
            </li>
        </ul>
        <?php 
    endforeach; 
        ?>
</div>


<?php
$args = array(
  'orderby' => 'name',
  'order' => 'ASC',
  'parent' => 0,
  'taxonomy'=>'product_cat',
);
$categories = get_categories($args);
?>
<ul class="main_cat_secc">
<?php
}
function mv_save_wc_order_other_fields( $post_id ) {
    remove_action( 'save_post', 'mv_save_wc_order_other_fields' );
    $manual_select = $_POST['manual_sel'];
	$women_sele_input = $_POST['women_sele_input'];
	$parent_catt = $_POST['getcategory_checked'];
	if(!empty($_POST['pro_sku']) && !empty($_POST['pro_title']) && !empty($_POST['manual_sel'])){
    $sku_pro = $_POST['pro_sku'];		
    $product = wc_get_product( $post_id );
	$current_products = $product->get_children();  
	$pro_title = get_the_title();
	$description_pro = get_the_content($post_id);
	$seo_descrip = get_post_meta($post_id,'_yoast_wpseo_metadesc',true);
    $seo_replace = str_replace($pro_title,$_POST["pro_title"],$seo_descrip);
	$string_rep = str_replace($pro_title,$_POST["pro_title"],$description_pro);
    $wc_adp = new WC_Admin_Duplicate_Product;
    $dup_product = $wc_adp->product_duplicate( $product );
	$dup_product2 = $dup_product->get_id(); 
    $dup_product = wc_get_product( $dup_product2 ); // recall the WC_Product Object
    $dup_product->set_name($_POST["pro_title"]);
    $dup_product->set_slug( sanitize_title($_POST["pro_title"]) ); // slug
    $dup_product->set_status( 'publish'); 
	$dup_product->set_description($string_rep);
	$dup_product->set_sku($sku_pro);
	if ( $dup_product->is_type( 'variable' ) ) {
		$current_products1 = $dup_product->get_children();
        foreach($current_products1 as $current_products2){
	    $product_variation1 = wc_get_product($current_products2); 
        $size_pro1 = $product_variation1->get_attribute( 'size' );
		$variation_sku_unit = $sku_pro.'-'.$size_pro1;
	    update_post_meta($current_products2, '_sku',$variation_sku_unit);		
	}
	}
	else{
		
	}
    if($manual_select == "manual"){
	 wp_set_post_terms( $dup_product2, $parent_catt, 'product_cat');	
	}		
	elseif($manual_select == "automatic"){
	/*************This code for Women select as method*****************/
	if($women_sele_input == "women"){
	 $curent_cat_id = get_the_terms( $post_id,'product_cat' );
     $catss = get_categories( array( 
        'child_of'   => 951,
        'taxonomy'   => 'product_cat',
        'hide_empty' => true
    ) );
	
	$chi_term_ar=array();
	foreach($catss as $catss4){	
	$chi_term_ar12=$catss4->term_id;
	$chi_term_ar[]=$catss4->term_id;
	}

$women_cat=array();
$arr_men_id = array();
$get_all_checked=array();
$errormsg = array();
foreach($curent_cat_id as $curent_cat_id9){
$cat_new_id6 = $curent_cat_id9->term_id;	
$get_all_checked[]=$cat_new_id6;
if(in_array($cat_new_id6,$chi_term_ar)){
$arr_men_id[]=$cat_new_id6;
}
}
foreach($arr_men_id as $arr_men_id2){
$term_cat = get_term_by('term_id', $arr_men_id2, 'product_cat'); 
$term_name_cat = $term_cat->slug;
$termm_ca_name = $term_cat->name;
if($term_name_cat == "casual-men"){
  $women_cat[] = 1038;
}
elseif($term_name_cat == "footwear-casual-men"){
$errormsg[]= " These category is not matched $termm_ca_name";
}
elseif($term_name_cat == "hoodies-casual-men"){
	$women_cat[] = 1039;
}
elseif($term_name_cat == "jackets-coats-casual-men"){
$errormsg[]= " These category is not matched $termm_ca_name";
}
elseif($term_name_cat == "joggers"){
	$women_cat[] = 1102;
}
elseif($term_name_cat == "shorts-casual-men"){
$errormsg[]= " These category is not matched $termm_ca_name";	
}
elseif($term_name_cat == "t-shirts-casual-men"){
	$women_cat[] = 1103;
}
elseif($term_name_cat == "vests-tanks"){
$errormsg[]= " These category is not matched $termm_ca_name";	
}
elseif($term_name_cat == "protection-men"){
	$women_cat[] = 956;
}
elseif($term_name_cat == "anklets-ankle-support"){
	$women_cat[] = 1046;
}
elseif($term_name_cat == "body-protectors"){
$errormsg[]= " These category is not matched $termm_ca_name";	
}
elseif($term_name_cat == "boxing-gloves-protection-men"){
	$women_cat[] = 1003;
}
elseif($term_name_cat == "ear-guards-protection-men"){
$errormsg[]= " These category is not matched $termm_ca_name";	
}
elseif($term_name_cat == "groin-guards-protection-men"){
$errormsg[]= " These category is not matched $termm_ca_name";	
}
elseif($term_name_cat == "hand-wraps-protection-men"){
	$women_cat[] = 1023;
}
elseif($term_name_cat == "head-guards-protection-men"){
	$women_cat[] = 1001;
}
elseif($term_name_cat == "knee-elbow-pads"){
	$women_cat[] = 1065;
}
elseif($term_name_cat == "mma-gloves-protection-men"){
	$women_cat[] = 1071;
}
elseif($term_name_cat == "mouth-guards-protection-men"){
	$women_cat[] = 957;
}
elseif($term_name_cat == "shin-guards-protection-men"){
	$women_cat[] = 996;
}
elseif($term_name_cat == "training"){
	$women_cat[] = 969;
}
elseif($term_name_cat == "boots-shoes"){
	$women_cat[] = 1050;
}
elseif($term_name_cat == "boxing-shorts"){
$errormsg[]= " These category is not matched $termm_ca_name";	
}
elseif($term_name_cat == "mma-compression-shorts"){
$errormsg[]= " These category is not matched $termm_ca_name";	
}
elseif($term_name_cat == "fight-shorts"){
	$women_cat[] = 1030; 
}
elseif($term_name_cat == "footwear-training"){
$errormsg[]= " These category is not matched $termm_ca_name";	
}
elseif($term_name_cat == "muay-thai-shorts"){
	$women_cat[] = 1191; 
}
elseif($term_name_cat == "rash-guards-training"){
	$women_cat[] = 1040; 
}
elseif($term_name_cat == "spats-leggings"){
	$women_cat[] = 1027; 
}
elseif($term_name_cat == "sweat-suits"){
$errormsg[]= " These category is not matched $termm_ca_name";	
}
elseif($term_name_cat == "training-tops"){
$errormsg[]= " These category is not matched $termm_ca_name";	
}
elseif($term_name_cat == "wrestling-boots-shoes"){
	$women_cat[] = 1207; 
}
elseif($term_name_cat == "uniforms"){
	$women_cat[] = 991; 
}
elseif($term_name_cat == "bjj-gi"){
	$women_cat[] = 1016;
}
elseif($term_name_cat == "kickboxing"){
	$women_cat[] = 1171;
}
elseif($term_name_cat == "Martial Arts Belts"){
	$women_cat[] = 992;
}

}
$arr_1_final = array_diff($arr_men_id, $get_all_checked);
$arr_2_final = array_diff($get_all_checked, $arr_men_id);
$reindex_arr = array_values($arr_2_final);
$adding_women_ids = array_merge($women_cat,$reindex_arr);
if(($key = array_search("951", $adding_women_ids)) !== false) {
    unset($adding_women_ids[$key]);
}

$final_arr = array_push($adding_women_ids,'955');
wp_set_post_terms( $dup_product2,$adding_women_ids, 'product_cat');	
}
/*************This code for kids select as method*****************/
elseif($women_sele_input == "kids"){
	 $curent_cat_id = get_the_terms( $post_id,'product_cat' );
     $catss = get_categories( array( 
        'child_of'   => 951,
        'taxonomy'   => 'product_cat',
        'hide_empty' => true
    ) );
	
	$chi_term_ar=array();
	foreach($catss as $catss4){	
	$chi_term_ar12=$catss4->term_id;
	$chi_term_ar[]=$catss4->term_id;
	}

$kids_cat=array();
$arr_men_id = array();
$get_all_checked=array();
foreach($curent_cat_id as $curent_cat_id9){
$cat_new_id6 = $curent_cat_id9->term_id;	
$get_all_checked[]=$cat_new_id6;
if(in_array($cat_new_id6,$chi_term_ar)){
$arr_men_id[]=$cat_new_id6;
}
}
foreach($arr_men_id as $arr_men_id2){
$term_cat = get_term_by('term_id', $arr_men_id2, 'product_cat'); 
$term_name_cat = $term_cat->slug;

if($term_name_cat == "casual-men"){

}
elseif($term_name_cat == "t-shirts-casual-men"){
$kids_cat[] = 1075;
}
elseif($term_name_cat == "hoodies-casual-men"){
	$kids_cat[] = 1125;
}
elseif($term_name_cat == "jackets-coats-casual-men"){
    $kids_cat[] = 1188;
}
elseif($term_name_cat == "protection-men"){
	$kids_cat[] = 958;
}
elseif($term_name_cat == "shorts-casual-men"){
	
}
elseif($term_name_cat == "body-protectors"){
	$kids_cat[] = 1053;
}
elseif($term_name_cat == "boxing-gloves-protection-men"){
	$kids_cat[] = 1048;
}
elseif($term_name_cat == "ear-guards-protection-men"){
	
}
elseif($term_name_cat == "groin-guards-protection-men"){
	$kids_cat[] = 1060;
}
elseif($term_name_cat == "hand-wraps-protection-men"){
	$kids_cat[] = 1024;
}
elseif($term_name_cat == "head-guards-protection-men"){
	$kids_cat[] = 1128;
}
elseif($term_name_cat == "mma-gloves-protection-men"){
	$kids_cat[] = 1096;
}
elseif($term_name_cat == "mouth-guards-protection-men"){
	$kids_cat[] = 959;
}
elseif($term_name_cat == "shin-guards-protection-men"){
	$kids_cat[] = 1054;
}
elseif($term_name_cat == "boots-shoes"){
	$kids_cat[] = 1051;
}
elseif($term_name_cat == "boxing-shorts"){
	
}
elseif($term_name_cat == "muay-thai-shorts"){
	$kids_cat[] = 1186; 
}
elseif($term_name_cat == "rash-guards-training"){
	$kids_cat[] = 1020; 
}
elseif($term_name_cat == "wrestling-boots-shoes"){
	$kids_cat[] = 1208; 
}
elseif($term_name_cat == "uniforms"){
	$kids_cat[] = 1017; 
}
elseif($term_name_cat == "bjj-gi"){
	$kids_cat[] = 1018;
}
elseif($term_name_cat == "kickboxing"){
	$kids_cat[] = 1164;
}

}
$arr_1_final = array_diff($arr_men_id, $get_all_checked);
$arr_2_final = array_diff($get_all_checked, $arr_men_id);
$reindex_arr = array_values($arr_2_final);
$adding_kids_ids = array_merge($kids_cat,$reindex_arr);
if(($key = array_search("951", $adding_kids_ids)) !== false) {
    unset($adding_kids_ids[$key]);
}

$final_arr = array_push($adding_kids_ids,'950');
wp_set_post_terms( $dup_product2,$adding_kids_ids, 'product_cat');		
}   


}
    $dup_product->save();
	update_post_meta($dup_product2, '_yoast_wpseo_title', $_POST["pro_title"]);
	update_post_meta($dup_product2, '_yoast_wpseo_metadesc', $seo_replace);
	update_post_meta($dup_product2, '_yoast_wpseo_focuskw', $_POST["pro_title"]);
	
    add_action( 'save_post', 'mv_save_wc_order_other_fields' );
    
}
}
add_action( 'save_post', 'mv_save_wc_order_other_fields', 10, 1 ); 
/****************Hook for addding css on admin*******************/
add_action( 'admin_enqueue_scripts', 'load_admin_styless' );
function load_admin_styless() {
  wp_enqueue_script( 'jquery' );
  wp_register_style('product_dup_css', plugins_url('/css/pro_dupli_style.css',__FILE__ ));
  wp_enqueue_style('product_dup_css');
  wp_enqueue_script( 'product-dup-js', plugins_url( '/js/product_duplicate.js', __FILE__ ));
}