CREATE TABLE IF NOT EXISTS `prescripteurs` (
`con_id` int(11) NOT NULL AUTO_INCREMENT,
`con_nom` varchar(100) NOT NULL,
`con_tel` varchar(30) NOT NULL,
`con_description` varchar(500) NOT NULL,
`con_mail` varchar(300) NOT NULL,
UNIQUE KEY `con_id` (`con_id`)
) ENGINE=innoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;


