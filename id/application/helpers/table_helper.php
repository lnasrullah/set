<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('table_helper'))
{
    function createTable($model,$column,$format=NULL)
    {
		$CI = & get_instance(); 
		
		if($format===NULL)
		{
			$format = array (
                    'table_open'          => '<table>',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

		}
		else if($format===1)
		{
			$format=array ( 
			'table_open'  => '<table class="table table-striped table-hover table-bordered"  id="sample_editable_1">'
			 );
		}
		
		else if($format===2)
		{
			$format=array ( 
			'table_open'  => '<table class="table table-striped table-hover table-bordered table-sortable" >'
			 );
		}
		
        $CI->table->set_template($format);
		
		$header=array();
		$attributeLabels=$model->attributeLabels();
		
		foreach($column as $column1)
		{
			if(is_array($column1))
			{
				$header[]=$column1[0];
			}
			else if(array_key_exists($column1,$attributeLabels))
			{
				$header[]=$attributeLabels[$column1];
			}
			else
			{
				$header[]=$column1;
			}
		}
		
		$CI->table->set_heading($header);
		
		if($model->data!=NULL)
		{
			$rownum=1;
			if(is_array($model->data))
			{
				foreach($model->data as $data)
				{
					$row=array();
					foreach($column as $column1)
					{
						if(is_array($column1))
						{
							$row[]=eval('return "'.$column1[1].'";');
						}
						else
						{
							$row[]=$data->$column1;
						}
					}
					$CI->table->add_row($row);
					$rownum++;
				}
			}
			else
			{
				$data=$model->data;
				$row=array();
				foreach($column as $column1)
				{
					if(is_array($column1))
					{
						$row[]=eval($column1[1]);
					}
					else
					{
						$row[]=$data->$column1;
					}
				}
				$CI->table->add_row($row);
				$rownum++;
			}
		}
		
		echo $CI->table->generate();
    }   
}

?>