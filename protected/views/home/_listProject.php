
 <?php
        $this->widget('booster.widgets.TbExtendedGridView', [
        'id' => 'project_grid',
        'type' => 'bordered condensed hover',
        'template'=>'{items}',
        'htmlOptions' => ['style'=>'width: 100%'],
        'dataProvider' => $vm->project->home(),
        'emptyText' => '<b>No</b> Projects Created yet.',
        'showTableOnEmpty'=>false,
        'columns' => [
            [
                'name' => 'project_code',
                'value' => '$data->proj_code',
                'header' => 'project_code',
                'sortable' => false,
                'htmlOptions' => ['style'=>'width: 100px'],
            ],
            [
                'name' => 'proj_name',
                'value' => '$data->proj_name',
                'header' => 'Project Name',
                'sortable' => false,
                'htmlOptions' => ['style'=>'width: 100px'],
            ],
            [
                'name' => 'Recent Update Date',
                'value' => '$data->ra_date',
                'header' => 'Recent Update Date',
                'sortable' => false,
                'htmlOptions' => ['style'=>'width: 100px'],
            ],

        ],
    ]);

?>