<?php

$this->router->add('login', '/cms.wolf/admin/login/', 
'LoginController:form');

$this->router->add('auth-admin', '/cms.wolf/admin/auth/', 
'LoginController:authAdmin', 'POST');

$this->router->add('dashboard', '/cms.wolf/admin/', 
'DashboardController:index');

$this->router->add('logout', '/cms.wolf/admin/logout/', 
'DashboardController:logout');

$this->router->add('pages', '/cms.wolf/admin/pages/', 
'PageController:listing');

$this->router->add('page-create', '/cms.wolf/admin/pages/create/', 
'PageController:create');

$this->router->add('page-add', '/cms.wolf/admin/page/add/', 
'PageController:add', 'POST');