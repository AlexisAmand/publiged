
-- --------------------------------------------------------

--
-- Table structure for table `familles`
--

CREATE TABLE `familles` (
  `id` int(11) NOT NULL,
  `ref` varchar(100) DEFAULT NULL,
  `pere` varchar(11) DEFAULT NULL,
  `mere` varchar(11) DEFAULT NULL,
  `enfant` varchar(11) DEFAULT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `familles`
--

INSERT INTO `familles` (`id`, `ref`, `pere`, `mere`, `enfant`, `date`) VALUES
(1, '10U', '7I', '9I', '3I', ''),
(2, '29U', '23I', '27I', '7I', ''),
(3, '40U', '34I', '38I', '23I', ''),
(4, '40U', '34I', '38I', '240I', ''),
(5, '40U', '34I', '38I', '264I', ''),
(6, '49U', '45I', '48I', '34I', ''),
(7, '77U', '72I', '76I', '45I', ''),
(8, '95U', '92I', '94I', '72I', ''),
(9, '95U', '92I', '94I', '117I', ''),
(10, '95U', '92I', '94I', '123I', ''),
(11, '95U', '92I', '94I', '445I', ''),
(12, '95U', '92I', '94I', '456I', ''),
(13, '115U', '108I', '114I', '92I', ''),
(14, '115U', '108I', '114I', '125I', ''),
(15, '115U', '108I', '114I', '128I', ''),
(16, '115U', '108I', '114I', '427I', ''),
(17, '135U', '128I', '133I', '402I', ''),
(18, '143U', '140I', '142I', '108I', ''),
(19, '143U', '140I', '142I', '206I', ''),
(20, '143U', '140I', '142I', '215I', ''),
(21, '143U', '140I', '142I', '222I', ''),
(22, '143U', '140I', '142I', '224I', ''),
(23, '143U', '140I', '142I', '226I', ''),
(24, '143U', '140I', '142I', '228I', ''),
(25, '154U', '151I', '153I', '114I', ''),
(26, '172U', '167I', '170I', '133I', ''),
(27, '189U', '179I', '183I', NULL, ''),
(28, '194U', '191I', '193I', '140I', ''),
(29, '199U', '196I', '198I', '142I', ''),
(30, '210U', '209I', '206I', NULL, ''),
(31, '219U', '215I', '218I', '230I', ''),
(32, '219U', '215I', '218I', '232I', ''),
(33, '219U', '215I', '218I', '234I', ''),
(34, '259U', '258I', '240I', NULL, ''),
(35, '268U', '264I', '266I', NULL, ''),
(36, '346U', '341I', '344I', '27I', ''),
(37, '346U', '341I', '344I', '356I', ''),
(38, '346U', '341I', '344I', '360I', ''),
(39, '346U', '341I', '344I', '364I', ''),
(40, '346U', '341I', '344I', '367I', ''),
(41, '346U', '341I', '344I', '370I', ''),
(42, '346U', '341I', '344I', '373I', ''),
(43, '408U', '406I', '402I', NULL, ''),
(44, '440U', '438I', '439I', '94I', ''),
(45, '464U', '462I', '456I', '474I', ''),
(46, '469U', '466I', '468I', '462I', '');
