<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model Extends CI_Model {

    public function get_xss_clean_name_value_pairs(array $name_value_pairs) {
        $xss_xlean_name_value_pairs = array();
        
        foreach($name_value_pairs as $key => $value) {
            $xss_xlean_name_value_pairs[$key] = $this->security->xss_clean($value);         
        }

        return $xss_xlean_name_value_pairs; 
    }
	
    public function get_data($options = array()){
        $data = array();

        if(isset($options['from']) AND strlen($options['from']) > 0){
    
            if(isset($options['fields'])){
                $this->db->select($options['fields'],FALSE);
            }
            else{
                $this->db->select('*');
            }

            $this->db->from($options['from']);
            
            if(isset($options['join'])){
                foreach($options['join'] as $join){
                    if(isset($join['table']) && isset($join['query'])){
                        if(isset($join['type'])){
                            $this->db->join($join['table'], $join['query'], $join['type']);
                        } else {
                            $this->db->join($join['table'], $join['query'],'left');
                        }
                    }
                }
            }
			
			if(isset($options['orlike'])) {
				if( is_array( $options['orlike'] ) ) {
					foreach( $options['orlike'] as $like ) {
						if( isset( $like['field'] ) and isset( $like['string'] ) ) {
							$this->db->or_like( $like['field'], $like['string'] );
						}
					}
				}
			}

            if(isset($options['where'])){
                $this->db->where($options['where']);
            }

            // set limit
			if(!isset($options['offset'])){
                $options['offset']=0;
            }
            if(isset($options['limit'])){
                $this->db->limit($options['limit'], $options['offset']);
            }

            // set order
            if(isset($options['order'])){
                $this->db->order_by($options['order']);
            }
			
			// set group
            if(isset($options['group'])){
                $this->db->group_by($options['group']);
            }

            // get data
            $query = $this->db->get();

            if($query->num_rows() > 0){
                
                if(isset($options['row']) AND $options['row'] == true){
					if ( ! empty ( $options["return_array"] ) ) {
						$data = $query->row_array();
					} else {
						// passed the row data to data variable as object
						$data = $query->row();
					}
                }
                else{
					if ( ! empty ( $options["return_array"] ) ) {
						// passed the object data to data variable as array
						$data = $query->result_array ();
					} else {
						 // passed the row data to data variable as object
						$data = $query->result();
					}
                }
            }
        }
        return $data;
    }
	
	public function get_count_data($options = array()){
		$count = 0;

        if(isset($options['from']) AND strlen($options['from']) > 0){
    
            if(isset($options['fields'])){
                $this->db->select($options['fields']);
            }
            else{
                $this->db->select('count(*) as cnt');
            }

            $this->db->from($options['from']);

            if(isset($options['join'])){
                foreach($options['join'] as $join){
                    if(isset($join['table']) && isset($join['query'])){
                        if(isset($join['type'])){
                            $this->db->join($join['table'], $join['query'], $join['type']);
                        } else {
                            $this->db->join($join['table'], $join['query'],'left');
                        }
                    }
                }      
            }

			if(isset($options['orlike'])) {
				if( is_array( $options['orlike'] ) ) {
					foreach( $options['orlike'] as $like ) {
						if( isset( $like['field'] ) and isset( $like['string'] ) ) {
							$this->db->or_like( $like['field'], $like['string'] );
						}
					}
				}
			}
			
            if(isset($options['where'])){
                $this->db->where($options['where']);
            }

            // set limit
			if(!isset($options['offset'])){
                $options['offset']=0;
            }
            if(isset($options['limit'])){
                $this->db->limit($options['limit'], $options['offset']);
            }

            // set order
            if(isset($options['order'])){
                $this->db->order_by($options['order']);
            }

            // get data
            $query 	= $this->db->get()->row();
			#var_dump ( $query );
			$count	= $query->cnt;
        }
        return $count;
	}
    /*
    Function: insert
        insert new data

    Parameters:
        table               - varchar
        name_value_pairs    - array

    Returns:
        last insert id
    */
    public function insert_data($table='', $name_value_pairs = array()){
        if($this->db->table_exists($table)){
            $this->db->insert($table,$this->get_xss_clean_name_value_pairs($name_value_pairs));
    		return $this->db->insert_id();
    	}
    	return false;
    }

    /*
	Function: update
        update specific data

    Parameters:
        table               - varchar
        condition           - array or varchar
        name_value_pairs    - array
    Returns:
        affected rows
    */
    public function update_data($table='', $condition=array(), $name_value_pairs = array()){
    	if($this->db->table_exists($table)){
			$this->db->update($table,$this->get_xss_clean_name_value_pairs($name_value_pairs),$condition);
			return $this->db->affected_rows();				
    	}
		return false;
    }

    /*
    Function: delete

    Parameters:
        table       - varchar
        condition   - array or varchar
    
    Returns:
        boolean
    */
    public function delete_data($table='',$condition=array()){

        if($this->db->table_exists($table)){       
            $this->db->where($condition);
            $this->db->delete($table);
			
			$this->load->dbutil(); //optimize
			$this->dbutil->optimize_table($table);
            return TRUE;
        }
        return FALSE;
    }
	
}