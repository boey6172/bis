
 <?php
        $this->widget('booster.widgets.TbExtendedGridView', [
        'id' => 'resident_grid',
        'type' => 'bordered condensed hover',
        'template'=>'{items}',
        'htmlOptions' => ['style'=>'width: 100%'],
        'dataProvider' => $vm->resident->search(),
        'emptyText' => '<b>No</b> You Havent added any resident yet.',
        'showTableOnEmpty'=>false,
        'columns' => [

            [
                'name' => 'Resident_Name',
                'value' => '$data->FullName',
                'header' => 'Resident Name',
                'sortable' => false,
                'htmlOptions' => ['style'=>'width: 100px'],
            ],
            [
                'name' => 'age',
                'value' => '$data->age',
                'header' => 'age',
                'sortable' => false,
                'htmlOptions' => ['style'=>'width: 100px'],
            ],
            [
                'name' => 'birthday',
                'value' => '$data->birthday',
                'header' => 'Birthday',
                'sortable' => false,
                'htmlOptions' => ['style'=>'width: 100px'],
            ],
            [
                'name' => 'Action',
                'header' => 'Action',
                'htmlOptions'=>['style'=>'width: 10%','nowrap'=>'nowrap'],
                // 'type' => 'raw',
                'value' =>  function($data){
                    
                    $this->widget(
                        'booster.widgets.TbButton',
                        [
                            // 'label' => 'View',
                            'icon' => 'fa fa-search ',
                            'context' => 'info',
                            'size' => 'small',
                            'buttonType' =>'link',
                            'htmlOptions' => [
                                'class'=>'btn_view_resident',
                                'ref'=>$data->resident_id,
                                // 'ref2'=>$data->status,
                                // 'ref3'=>$data->category,
                            ],
                        ]
                    );
                    echo " ";
                    $this->widget(
                        'booster.widgets.TbButton',
                        [
                            // 'label' => 'Update',
                            'icon' => 'fa fa-edit ',
                            'context' => 'warning',
                            'size' => 'small',
                            'buttonType' =>'link',
                            'htmlOptions' => [
                                'class'=>'btn_edit_resident',
                                'ref'=>$data->resident_id,
                                // 'ref2'=>$data->status,
                                // 'ref3'=>$data->category,
                            ],
                        ]
                    );
                    echo " ";
                    $this->widget(
                        'booster.widgets.TbButton',
                        [
                            // 'label' => 'Delete',
                            'icon' => 'fa fa-trash ',
                            'context' => 'danger',
                            'size' => 'small',
                            'buttonType' =>'link',
                            'htmlOptions' => [
                                'class'=>'btn_delete_resident',
                                'ref'=>$data->resident_id,
                                // 'ref2'=>$data->status,
                                // 'ref3'=>$data->category,
                            ],
                        ]
                    );
                            
                },
            ],
            

        ],
    ]);

?>