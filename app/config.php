<?php

//���ݿ�����
$config_db['hostname'] = 'localhost';
$config_db['username'] = 'root';
$config_db['password'] = '';
$config_db['database'] = 'ci_rbac';
$config_db['char_set'] = 'utf8';

//·������
$config_rt['type']     = '2';	  						//URLģʽ,1:Ĭ��($_GET['c']:������,$_GET['m']:����),2:PathInfo,3:���
$config_rt['class']    = 'Index'; 						//Ĭ�Ͽ�������
$config_rt['method']   = 'index'; 						//Ĭ�Ϸ���
$config_rt['redict']['Index/test']   = 'Index/index'; //�ض���

