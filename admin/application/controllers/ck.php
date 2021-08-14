<?php
$dis = $this->config->item('topup_default');
			if($this->input->post('ais')!=$dis[1] || $this->input->post('dtac')!=$dis[2] || $this->input->post('true')!=$dis[3] || $this->input->post('imobile')!=$dis[4] || $this->input->post('my')!=$dis[5]){
				
				$value = '0,'.$this->input->post('ais').','.$this->input->post('dtac').','.$this->input->post('true').','.$this->input->post('imobile').','.$this->input->post('my');
				
				$this->db->where('company_id',$this->input->post('id'));
				$this->db->where('var_name','vip');
				$q=$this->db->get($this->config->item('topup_config'));
				if($q->num_rows()>0){
					$this->db->where('company_id',$this->input->post('id'));
					$this->db->where('var_name','vip');
					$this->db->update($this->config->item('topup_config'),array('var_value'=>$value));
				}else{
					$this->db->insert($this->config->item('topup_config'),array('company_id'=>$this->input->post('id'),'var_name'=>'vip','var_value'=>$value));
				}
			}else{
				$this->db->where('company_id',$this->input->post('id'));
				$this->db->where('var_name','vip');
				$this->db->delete($this->config->item('topup_config'));	
			}
			
			$this->db->where('id',$this->input->post('id'));
			if($this->input->post('password1')){
				if($this->input->post('password1') == $this->input->post('password2')){
					$this->db->set('password',md5($this->input->post('password1')));
				}
			}
			$data_udp=array(
				'name'		=> $this->input->post('name'),
				'email'		=> $this->input->post('email'),
				'cash_online'		=> $this->input->post('cashonline'),
				'telephone'	=> $this->input->post('telephone'),
				'otp_telephone'	=> $this->input->post('telephone'),
				'address'	=> $this->input->post('address'),
				'province'	=> $this->input->post('province'),
				'amphur'	=> $this->input->post('amphur'),
				'district'	=> $this->input->post('district'),
				'postal'	=> $this->input->post('postal'),
				'agent'		=> $this->input->post('agent'),
				'upline'	=> $this->input->post('guide'),
				'active'	=> $this->input->post('active')
			);
			$this->db->update($this->config->item('system_company'),$data_udp);
			
			echo '1';
			
		}else{
			
			$data['topup_discount'] = $this->config->item('topup_default');
			$this->db->where('company_id',$this->input->post('id'));
			$this->db->where('var_name','vip');
			$q=$this->db->get($this->config->item('topup_config'));
			if($q->num_rows()>0){
				$r=$q->row();
				$data['topup_discount']=explode(',',$r->var_value);
			}
			
			$this->db->where('id',$this->input->post('id'));
			$q=$this->db->get($this->config->item('system_company'));
			$data['r']=$q->row();
			
			$this->db->select('province_id,province_name');
			$data['province']=$this->db->get($this->config->item('system_province'));
			
			$this->db->where('province_id',$data['r']->province);
			$this->db->select('amphur_id,amphur_name');
			$data['amphur']=$this->db->get($this->config->item('system_amphur'));
			
			/*$this->db->where('amphur_id',$data['r']->amphur);
			$this->db->select('district_id,district_name');
			$data['district']=$this->db->get($this->config->item('system_district'));*/
			
			$this->load->view('customers/edit',$data);
		}