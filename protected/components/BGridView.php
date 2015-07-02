<?php

Yii::import('zii.widgets.grid.CGridView');

class BGridView extends CGridView {

	public $htmlOptions = array('class' => '');
	public $emptyText = 'Data tidak ditemukan';
	public $summaryText = 'Menampilkan {start}-{end} dari {count}';
	public $itemsCssClass = 'tabel-index';
	public $pagerCssClass = 'pagination-centered';
	public $pager = array(
		 'header' => '',
		 'firstPageCssClass' => 'arrow',
		 'firstPageLabel' => '&laquo;',
		 'prevPageLabel' => '&lsaquo;',
		 'nextPageLabel' => '&rsaquo;',
		 'htmlOptions' => array('class' => 'pagination'),
		 'hiddenPageCssClass' => 'unavailable',
		 'selectedPageCssClass' => 'current',
		 'lastPageCssClass' => 'arrow',
		 'lastPageLabel' => '&raquo;',
	);
}
