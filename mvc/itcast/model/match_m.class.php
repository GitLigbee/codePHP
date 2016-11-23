<?php 
	require_once M_dir.'model.class.php';
	class match_m extends model{
		public function match_list(){
			$sql = 'select m.m_id,t.t_name as t1,m.t1_score,a.t_name as t2,m.t2_score,m.m_time from  tch as m left join team as t on m.t1_id=t.t_id left join team as a on m.t2_id=a.t_id';
			return $this->db->get_all($sql);
		}
	}
 ?>