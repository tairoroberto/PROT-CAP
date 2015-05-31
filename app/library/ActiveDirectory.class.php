<?php

class ActiveDirectory{

    private $ldap;//conexão básica do AD
    private $ldapBind;//conexão avançada do AD
    private $serverAD = 'WIN-BRLQMN2JGL8';//IP do servidor LDAP // ex: WIN-BRLQMN2JGL8
    private $userAD = 'Administrator';//usuario para acesso geral do AD
    private $domain = '@nowsolucoes.com.br'; //dominio ex: @meudominio.com.br
    private $passwordAD = 'Admin@123';//senha para acesso geral do AD
    private $dnAD = 'ou=Usuarios,dc=nowsolucoes,dc=com,dc=br';//Especifique o OU(Organizational Unit), DC(Domain Component). Lembrando que é ao contrário LOL
    private $protocolVersion = 3;


    private $filter = "(&(objectCategory=person)(objectClass=user)
                    (!(userAccountControl:1.2.840.113556.1.4.803:=2))
                    (department=*)
                    (company=*)
                    (cn=*)
                    (!(cn=acesso*))(!(cn=AD01*))(!(cn=Agenda*))(!(cn=AM-TI*))
                    (!(cn=AM-VEN*))(!(cn=BA-*))(!(cn=backup*))(!(cn=Bahia_*))
                    (!(cn=BKP-*))(!(cn=bloqueio_*))(!(cn=Bunzl*))(!(cn=CAMERA*))
                    (!(cn=CAMP-*))(!(cn=Campinas_*))(!(cn=Compras_*))(!(cn=Contabilidade*))
                    (!(cn=Controladoria*))(!(cn=controladoria_*))(!(cn=Copa*))(!(cn=Cotacap*))
                    (!(cn=credito-*))(!(cn=ctat*))(!(cn=CTAT-*))(!(cn=despesas*))
                    (!(cn=Diretoria*))(!(cn=ECO-*))(!(cn=ECOPC-*))(!(cn=ecousers*))
                    (!(cn=ERP*))(!(cn=EXCH-*))(!(cn=Expedicao*))(!(cn=Expedição*))
                    (!(cn=fabrica*))(!(cn=Fale Abertamente*))(!(cn=faleabertamente*))(!(cn=Faturamento*))
                    (!(cn=Filial*))(!(cn=FILIAL-*))(!(cn=filial.*))(!(cn=filial_*))
                    (!(cn=Financeiro*))(!(cn=Fiscal*))(!(cn=FTP*))(!(cn=Grupo*))
                    (!(cn=grupo-*))(!(cn=html*))(!(cn=Importação*))(!(cn=Infra*))
                    (!(cn=intra-*))(!(cn=INTRANET*))(!(cn=Intranet*))(!(cn=iomega*))
                    (!(cn=Justificativas*))(!(cn=Labor Import*))(!(cn=Lan H*))(!(cn=Lan1*))
                    (!(cn=Lan2*))(!(cn=Lan3*))(!(cn=Lan4*))(!(cn=lanhouse*))(!(cn=Logis_sp*))
                    (!(cn=Logistica*))(!(cn=MA-*))(!(cn=MAC-*))(!(cn=Macae_*))(!(cn=makro*))
                    (!(cn=Manaus*))(!(cn=MG-*))(!(cn=Minas_*))(!(cn=mktbunzl*)) 
                    (!(cn=Netconsulting*))(!(cn=NFE*))(!(cn=RS-*))(!(cn=S. Reunião*))
                    (!(cn=Sac_*))(!(cn=Sala de*))(!(cn=Sala TI*))(!(cn=saocarlos_*))
                    (!(cn=saopaulo*))(!(cn=SCA-*))(!(cn=serasa*))(!(cn=Service Desk*))
                    (!(cn=Servicos*))(!(cn=Servidores*))(!(cn=SinsysEPI*))
                    (!(cn=SISTEMAMASTER*))(!(cn=Sistemas*))(!(cn=SOS Backup*))
                    (!(cn=SOS-*))(!(cn=SOSBACKUP*))(!(cn=SPO-*))(!(cn=squid*))
                    (!(cn=SRV-*))(!(cn=Suporte*))(!(cn=Taubate*))(!(cn=TB-*))
                    (!(cn=Tecnologia*))(!(cn=TI-*))(!(cn=TMG-*))(!(cn=Transferencia*))
                    (!(cn=Treinamento*))(!(cn=treinamento.*))(!(cn=Vendas*))(!(cn=VMCENTER*))
                    (!(cn=VMSERVER*))(!(cn=vpn*))(!(cn=Warehouse*))(!(cn=WSUS-*)))";


    public function __construct() {
        $ldap = ldap_connect($this->serverAD) or die('não foi possível conectar');
        $this->ldap = $ldap;
        $this->ldapBind = false;
    }


    public function connect() {
        if($this->ldapBind === false) {
            $this->ldapBind = $this->ldap;
            if ( !ldap_set_option($this->ldapBind, LDAP_OPT_PROTOCOL_VERSION, $this->protocolVersion ) ) {
                exit( 'Falha em definir protocolo na versao '.$this->protocolVersion );
            }
            ldap_set_option($this->ldapBind, LDAP_OPT_REFERRALS, 0 );
            ldap_bind($this->ldapBind);
            if ( ldap_errno($this->ldapBind) !== 0 ) {
                exit('Nao foi possivel conectar no servidor');
            }
            ldap_bind($this->ldapBind , $this->userAD.$this->domain , $this->passwordAD);
            if (ldap_errno($this->ldapBind) !== 0) {
                return false;
            }
        }
        return true;
    }

    public function isUser($user) {
        if($this->connect() === true) {
            $searchResults = ldap_search($this->ldapBind, $this->dnAD, '(|(samaccountname='.$user.'))');
            if (count(ldap_get_entries($this->ldapBind , $searchResults)) > 1) {
                return true;
            }
        }
        return false;
    }

    public function authUser($user , $password) {
        if (strlen($password) > 0) {
            $bind = ldap_bind($this->ldap , $user.$this->domain , $password);
            if ($bind) {
                return true;
            }
        }
        return false;
    }

    public function getUser($user) {
        if($this->connect() === true) {
            $searchResults = ldap_search($this->ldapBind , $this->dnAD , '(|(samaccountname='.$user.'))');
            if (count(ldap_get_entries($this->ldapBind , $searchResults)) > 1) {
                $object = ldap_get_entries($this->ldapBind , $searchResults);
                $user = $object[0];
                return $user;
            }
        }
        return "usuário não encontrado.";
    }

    public function getUserForBirthday() {
        $mes = date('m');
        $usersBirthday = array();
        if($this->connect() === true) {
            $searchResults = ldap_search($this->ldapBind , $this->dnAD , $this->filter);
            if (count(ldap_get_entries($this->ldapBind , $searchResults)) > 1) {
                $users = ldap_get_entries($this->ldapBind , $searchResults);
                foreach($users as $user){
                    if(isset($user['pager'][0])){
                        $birthday =  explode('/',$user['pager'][0]);
                       if (isset($birthday[1])) {
                           if($birthday[1] == $mes){
                                $usersBirthday[] = $user;
                            }
                       }
                    }
                }
                return $usersBirthday;
            }
        }
        return "usuários não encontrados.";
    }


     public function getUsers() {    
        if($this->connect() === true) {
            $searchResults = ldap_search($this->ldapBind , $this->dnAD , $this->filter);
            if (count(ldap_get_entries($this->ldapBind , $searchResults)) > 1) {
                $users = ldap_get_entries($this->ldapBind , $searchResults);
                return $users;
            }
        }
        return "usuários não encontrados.";
    }


}
