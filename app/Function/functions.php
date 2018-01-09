<?php
	function getCateMenu($cateData, $parent_id = 0, $str = '', $sltValue=0){
		foreach ($cateData as $key => $value) {
			$id = $value['id'];
			if($value['parent_id'] == $parent_id) {
				if ($sltValue == $id) {
					echo "<option value='".$value['id']."' selected='selected'>".$str.$value['name']."</option>";
				}
				else{
					echo "<option value='".$value['id']."'>".$str.$value['name']."</option>";
				}
				unset($cateData[$key]);
				getCateMenu($cateData, $id, $str.'---');
			}
		}
	}
?>
