<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends MY_Model {
	
	function __construct () {
		parent::__construct ();
	}
	
	function quick_query( $options = array() ) {
		if ( ! empty( $options ) ) {
			if ( is_array( $options ) ) {
				if ( count( $options ) > 0 ) {
					if ( empty( $options["cnt"] ) ) {
						return parent::get_data( $options );
					} else {
						return parent::get_count_data( $options );
					}
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	function manage_records( $params = array() ) {
		if ( ! empty( $params ) ) {
			if (! empty ($params["is_delete"]) ) {
				return parent::delete_data($params['tablename'], $params['condition']);
			} else {
				if ( ! empty( $params['condition'] ) and ! empty( $params['values'] ) ) {
					return parent::update_data( $params['tablename'], $params['condition'], $params['values'] );
				} else {
					if ( ! empty( $params['values'] ) ) {
						return parent::insert_data( $params['tablename'], $params['values'] );
					} else {
						return false;
					}
				}
			}
		} else {
			return false;
		}
	}

	function get_limit_offset($params) {
		
		$limit		= "";
		if ( ! empty ($params->limit) ) {
			$limit	= " LIMIT " . $params->limit->offset . ", "  . $params->limit->limit;
		}
		return $limit;
	}
	
	function get_safe_name( $params = array() ) {
		if ( ! empty( $params ) ) {
			$ctr 		= 0;
			$true		= false;
			$safe_name	= $params['safe_name'];
			while ( ! $true ) {
				$safe_name	= ( $ctr > 0 ) ? $params['safe_name'] . '-' . $ctr : $safe_name;
				if ( $this->db->get_where( $params['tablename'], array( $params['safe_field'] => $safe_name ) )->num_rows() > 0 ) {
					$safe_name = false;
					$ctr++;
				} else {
					$true = true;
				}
			}
			return $safe_name;
		} else {
			return false;
		}
	}
		
}