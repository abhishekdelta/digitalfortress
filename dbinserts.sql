-- phpMyAdmin SQL Dump
-- version 3.1.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2011 at 02:27 AM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pragyan10_digitalfortress`
--

--
-- Dumping data for table `digifort_levels`
--

INSERT INTO `digifort_levels` (`level_id`, `level_name`, `level_desc`, `level_points`, `level_info`, `level_wins`, `level_attempts`, `level_win_users`) VALUES
(10, 'hacklandsecurityagency', 'Hackland Security Agency', 150, 'Hackland Security Agency is in deep trouble!<br/> An evil scientist from an enemy state, has invented a device which can jam all the wireless signals coming to and from Hackland. HSA believes that the scientist is negotiating with a terrorist group and they must act fast. They have successfully implanted a packet-sniffer on his network, but they found all the communications were encrypted. To decrypt it, they need a "passkey", which is again, encrypted! Fortunately, they have recieved the following information from an HSA informer about the scientist''s passkey:<br/><b><br/>\r\n<ul>\r\n<li>The passkey consists of only "lowercase alphabetical characters" and no numbers.\r\n<li>The passkey is not a dictionary word.\r\n<li>The passkey is encrypted with an algorithm, invented by the scientist himself.\r\n</ul></b><br/>\r\nThe HSA informer had also stolen the encrypted passkey and a binary of the encryption algorithm which the scientist uses for encryption. Unfortunately, his cover was blown before he could steal the decryption algorithm. So along with the above information, you also have the encrypted passkey and a binary of his encryption algorithm.<br/>\r\nYour challenge is to decrypt the encrypted passkey by reverse engineering the algorithm and hand it over to HSA before its too late!<br/>All the above information are at your disposal. Best of Luck!\r\n<br/>\r\n<br/>\r\n\r\nDownload the binary of the encryption algorithm : <input type="button" value="download" onclick=''window.open("encrypt.zip","_top")'' />\r\n<br/>\r\n<br/>\r\nThe encrypted passkey is : 2397574293-0112002020\r\n<br/><br/>', 2, 2, '|{5818}|{2089}'),
(5, 'hacklandcentralbank', 'Hackland Central Bank', 100, 'Hackland Central Bank has designed a new website which it claims to be highly secure. However, you are not satisfied with their claim and have decided to break into their website and gain administrator privilege. <br/> Your mission is to become the administrator of the website.', 7, 7, '|{1525}|{7418}|{7461}|{1677}|{6532}|{7546}|{7550}'),
(1, 'capturekey', 'Step into Digital Fortress!', 50, 'Dexter has recently learned webdesigning but he screwed up with his first website. He did something wrong and now he can''t even access his page. <br/>Can you help him ? And while helping him, try to look for a hidden password too :)', 26, 26, '|{856}|{2154}|{1361}|{7397}|{44}|{7411}|{7418}|{2607}|{1677}|{7427}|{5818}|{7439}|{7461}|{951}|{7486}|{7498}|{4727}|{7506}|{7519}|{6532}|{7546}|{7548}|{7551}|{7550}|{7552}|{6265}'),
(2, 'lstutorial', 'Dexter''s ls tutorial', 50, 'Dexter is now a Linux user and using php he created a small tutorial for the linux ''ls'' command. However, Dexter made sure that only sub-directories are accessible and no one is able to access any of the parent directories.<br/><br/> Your task is to find a hidden password !', 25, 25, '|{6603}|{6042}|{3996}|{4000}|{7397}|{6853}|{44}|{7248}|{7411}|{1632}|{7418}|{2607}|{1677}|{7424}|{5818}|{2089}|{7461}|{951}|{5957}|{7498}|{7506}|{7546}|{7552}|{7556}|{2179}'),
(9, 'codename47', 'Code Name 47', 200, 'Tight Security runs a website wherein it apparently offers various information and free services to its users.\r\nAs unknown by the mass, it is basically a overground projection of a mafia group''s underground website.<br/>\r\nAccording to our latest information, the report collection protocol of their underground website stopped working.\r\nHence their agents were forced to submit there reports by one of the message posting system provided free to the general public by Tight Security.<br/>\r\nNow listen up, it has been a rumour that the life of a great personality is in danger. Their agent number forty seven has recently submitted the report to the mainstream website.<br/>\r\nWe want to know who is that personality so that we can get prepared. And that''s your job to find out.\r\nOn the website, anyone is eligible to post messages which can only be viewed by the website owner. They save all the messages in individual files.<br/>\r\nBut the access of those files are forbidden. Your job is to somehow find that file containing information and get the name of that personality.<br/>\r\nWe are counting on you.<br/>\r\nBest of luck.\r\n', 0, 0, ''),
(7, 'dragonshift', 'Dragon Shift', 150, 'This DragonShift dudes think that they are the best in the world. Keep claiming that they are the past, present and future blah blah.<br/>\r\nTo us they are Dragon Shit instead of Dragon Shift. The main culprit is their head and chief Mark. He thinks that he has become some kind of a saviour of the world\r\nby forming this DragonShift. <br/>We want you to find out the password of Mark.<br/>\r\nWe know you can do it. All the best. \r\n', 3, 3, '|{6042}|{7498}|{7550}'),
(6, 'glider', 'Glider : The Hacker''s Emblem', 100, 'How much can you make use of the Glider:The hacker''s emblem?', 0, 0, ''),
(11, 'monalisa', 'Monalisa', 200, 'Last month, 18 of the emails of Nizab-ul-quadar ( A terrorist group ) were intercepted by our security experts. The first few email discussed about planting of a\r\nDigital Bomb somewhere in Hackland.<br/> The eighteenth mail were supposed to carry the information about where this bomb has been planted. But to our surprise we only received, this image as the email. Our expert say that this was the only thing they found. I have given a re-interception request to the headquarters but we don''t have much time left. I suspect that there is some meaning associated with this image. Unfortunately I am not able to find that out. So I just thought perhaps you could do something about it. Please, do this as soon as possible. This is of highest priority. <br/>If we are able to find out the location of the bomb before hand, I think we have a very good change to defuse it before it blows.<br/>\r\nMillions of life are in your hand. Please do something.\r\n', 0, 0, ''),
(4, 'tightsecurity', 'Tight Security', 50, 'This page contains the password. They are not letting me in. Please help me to get the password.\r\n', 4, 4, '|{1361}|{7411}|{7418}|{7498}'),
(3, 'hacklandonlinestore', 'Hackland Online Store', 50, 'Why care for piracy when you can buy the original? (with others'' credit card) ;)\r\n\r\nDexter knows there''s a rich guy with username ''richierich'' who is registered to Hackland Online Store. Can you get his Credit Card Number ?', 14, 14, '|{6603}|{3996}|{6853}|{44}|{7248}|{7411}|{1632}|{7418}|{2607}|{7423}|{1677}|{7424}|{7427}|{5818}'),
(8, 'appcrack', 'Crack the application', 150, 'Download the application <input type="button" value="download" onclick=''window.open("crack.zip","_top")'' />', 1, 1, '|{6603}'),
(12, 'hacklandsecurityagency2', 'Hackland Security Agency, Again!', 150, 'Hackland Security Agency is in trouble again!<br/> \r\nNow that HSA has the passkey given by you, even then they are not able to decrypt the encrypted message. As usual, the HSA has stolen a copy of the encryption algorithm. This time, the algorithm is not so simple. It uses the passkey to encrypt the message and hence, the same message can have different encryptions depending on the passkey!<br/>\r\nIt seems HSA is just a bunch of useless coders and they need your help again!<br/>\r\nThey assume you already have the passkey when you completed Level 10. They now give you the encrypted message sent by the terrorists to the evil scientist. HSA believes it contains the Address and Time of their meeting and hence, they must decode it.<br/>\r\nThey also know the following information :\r\n<b><br/>\r\n<ul>\r\n<li>The message consists of "lowercase alphabetical characters", spaces and numbers only but no special characters.\r\n<li>The passkey is the same as found in Level 10.\r\n</ul></b><br/>\r\n<br/>\r\n<br/>\r\nThe encrypted message is :FFE888C239494DD4411B1EADA9B6E2D3F9\r\n<br/><br/>\r\nDownload the binary of the encryption algorithm : <input type="button" value="download" onclick=''window.open("modencrypt.zip","_top")'' />\r\n<br/>\r\n', 0, 0, ''),
(13, 'richard', 'Richard Stallman', 150, '<img align="center" src="rms.bmp"/><br/>\r\nThis is RMS, Richard Stallman. He is popularly called as the Hacker''s God.<br/>\r\nNo, he is not into the type of hacking that you are doing. He develops opensource softwares. He is from MIT''s AI Lab.<br/>\r\nHe launched the project called GNU which is a recursive acronym for "GNU is Not Unix".\r\nRMS started this project as soon as he quit the AI Lab. The project was started at 1983.\r\nHe wrote few pieces of information such as the its policy (free policy) and few source code\r\nin 1983.<br/>\r\nThe project was partially sucessful but it is not yet complete. The kernel is still not fully written.<br/>\r\nThe reason is unknown, but few say that as Linux drove in, RMS lost his interest in GNU''s Kernel.\r\nWhen asked the reason, all he sends is this image of his with a note <i>``if you are smart enough, you will find out.\r\nIf you aren''t, you don''t need to."</i>\r\nSo, we are not smart enough, perhaps you are. :)\r\n', 0, 0, '');

--
-- Dumping data for table `hacklandcentralbank`
--

INSERT INTO `hacklandcentralbank` (`username`, `userfullname`, `useremail`, `authid`, `type`) VALUES
('ggill', 'Mr. George Gillmore', 'georgegillmore@hacklandmail.hl', '3b5ff32c0aaadef6a8f423a7ddc39c', 'celeb'),
('mrohit', 'Mr. Rohit Mehra', 'rohitmehra@hacklandmail.hl', '35d718d6858b719375f2ca21d31547', 'celeb'),
('karmick', 'Mr. Karmic Kola', 'karmickola@hacklandmail.hl', '2d27eac9c582dadd94f4340324985d', 'both'),
('athena', 'Ms. Athena Robinson', 'athenarobinson@hacklandmail.hl', '0454aa97682235df3ed1a3456bc86e', 'celeb'),
('raymondwil', 'Mr. Raymond Willson', 'raymondwilson@hacklandmail.hl', 'ef166dfbd891c0eeb85064dfcac93b', 'celeb'),
('inibex', 'Mr. Intrepid Ibex', 'interpidinbex@hacklandmail.hl', 'b957757a75e34879ac17579dd43c51', 'both'),
('robg', 'Mr. Robert Gates', 'robertgates@hacklandmail.hl', 'fac214f0cb183914111043aa02f50d', 'celeb'),
('aishk', 'Ms. Aish Kaur', 'aishkaur@hacklandmail.hl', '7bf4e0dc50a02ab3022d0b29345e9d', 'special'),
('fredo', 'Mr. Fredo Baggins', 'fredobaggins@hacklandmail.hl', '7aec5e35a56630ecc364ad842ffad9', 'special'),
('noorp', 'Ms. Noor Peterson', 'noorpeterson@hacklandmail.hl', '80d9215f7a71f29000b638a3acd479', 'special'),
('susanf', 'Ms. Susan Fletcher', 'susanfletcher@hacklandmail.hl', 'a24948599b73ac3f44a6fd1f2a8e50', 'special'),
('norton', 'Mr. Norman Norton', 'normannorton@hacklandmail.hl', '1b7d9167ab164f30fa0d1e47497fae', 'special');

--
-- Dumping data for table `hacklandonlinestore`
--

INSERT INTO `hacklandonlinestore` (`name`, `username`, `password`, `creditcardid`) VALUES
('abhishek', 'abhishekdelta', '5de053bad4d39deebc266df0f04902cc', '123123123123'),
('abhishek', '123', '202cb962ac59075b964b07152d234b70', '123'),
('t3rm', 't3rm', 'f568a605f913061a84ab31d0237ff094', '11'),
('naseef', 'naseef', '912ec803b2ce49e4a541068d495ab570', '1234'),
('Mr. Richie Rich', 'richierich', '08f5a1d995c7b669d43fd449cb27b9be', '9411233162209009'),
('a', 'a', '0cc175b9c0f1b6a831c399e269772661', '123'),
('123456', '123456', 'e10adc3949ba59abbe56e057f20f883e', '123456'),
('kkk', 'kkk', 'fe959f2469aaa23d4821993d38381a3c', '123'),
('1234567''', '1234567', 'fcea920f7412b5da7be0cf42b8c93759', '1234567'),
('Shirish Mishra', 'shirishmishra', '705b0e90561af0d8dac4f5d781ed7136', '378282246310005'),
('richierich', 'hello', '5d41402abc4b2a76b9719d911017c592', '88'),
('asdf', 'fdsa', '0cc175b9c0f1b6a831c399e269772661', '12'),
('john', 'yogi', '33bcea61ff7edac1e6c777b5d6607076', '123456'),
('mayank', 'm', '6f8f57715090da2632453988d9a1501b', '789'),
('jaggu', 'jaggu', 'a8f5f167f44f4964e6c998dee827110c', '1234567890'),
('sandy', 'sandy', 'e37730d26313eca8bda8e663f8310daa', '123456'),
('Freakish Hacker', 'jinpoxy@gmail.com', 'df53ca268240ca76670c8566ee54568a', '100'),
('b', 'b', '92eb5ffee6ae2fec3ad71c777531578f', '123'),
('sachin16', 'sachin16', 'fc5e038d38a57032085441e7fe7010b0', '1619'),
('abcd', 'abcd', 'e2fc714c4727ee9395f324cd2e7f331f', '1234'),
('aa', 'aa', '4124bc0a9335c27f086f24ba207a4912', '1 or 1=1 #'),
('sls', 'richierich'' or ''122', '0cc175b9c0f1b6a831c399e269772661', '1'),
('sls', 'richierich #', '0cc175b9c0f1b6a831c399e269772661', '1'),
('mayank', 'mayank', '308a3820e4cccbe043cb5228de5e71e3', '1'),
('sls', '   richierich  ', '0cc175b9c0f1b6a831c399e269772661', '1234'),
('a ', ' richierich', '0cc175b9c0f1b6a831c399e269772661', '1'),
('zoomer', 'pcsin', 'e10adc3949ba59abbe56e057f20f883e', '2131233243423442424'),
('sls'' #', 'sls', '77539a26fb5c4d0af80d43a295bb6053', '11'),
('afg', 'afg', 'ee676ed9ce5bd51b4452ddfbdf962ef7', '11'),
('afg', ' afg', '0cc175b9c0f1b6a831c399e269772661', '11'),
('abcd', 'richierich''', '0cc175b9c0f1b6a831c399e269772661', '1'),
('a', 'richierich"', '0cc175b9c0f1b6a831c399e269772661', '1'),
('a', 'richierich\0', '0cc175b9c0f1b6a831c399e269772661', '1'),
('a', '%72%69%63%68%69%65%72%69%63%68', '0cc175b9c0f1b6a831c399e269772661', '1'),
('richierich', 'h', '2510c39011c5be704182423e3a695e91', '1'),
('a', 'richierich     a', '4f3866d453f04b8de14159de67d58409', '1'),
('a', 'abc', '0cc175b9c0f1b6a831c399e269772661', '123'),
('sdfsfd', 'sdfsfd', '99b6814ccfb074ad6acb28ae47e5db1a', '123456'),
('ahh', 'ahh', 'be97edab9d08c80db8111360d744fa0a', '12345678901234567890'),
('--', 'manvs', '827ccb0eea8a706c4c34a16891f84e7b', '123123'),
('ls', 'ls', '44ba5ca65651b4f36f1927576dd35436', '0'),
('god', 'god', 'a4757d7419ff3b48e92e90596f0e7548', '123'),
('hack', 'hack', '202cb962ac59075b964b07152d234b70', '123'),
('dfgsdfgsg', '--', 'e10adc3949ba59abbe56e057f20f883e', '1231231312'),
('3213', '/**/', '202cb962ac59075b964b07152d234b70', '23123123'),
('''''''', '123123', 'cfab1ba8c67c7c838db98d666f02a132', '123123123'),
('erwrwer', '''''''', 'cfab1ba8c67c7c838db98d666f02a132', '123123'),
('tester', 'tester', 'df53ca268240ca76670c8566ee54568a', '100'),
('ri', 'ri', '08c7b0daa33b1e5e86a230c1801254c9', '123'),
('a'' or ''1''=''1--', 'a'' or ''1''=''1--', '368247f89d9526cd015d5d4da0e022f2', '000'),
('Sphinx', 'sphinx', 'c4ca4238a0b923820dcc509a6f75849b', '123456789'),
('f', 'f', '8fa14cdd754f91cc6554c9e71929cce7', '9'),
('u', 'u', '7b774effe4a349c6dd82ad4f4f21d34c', '8'),
(' <!--#exec cmd="ls" -->', ' <!--#exec cmd="ls" -->', 'e21883d3d2d7ff8c0f44999c831339c7', '123131313'),
('1', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1'),
('Dexter', 'dexter', 'a125a6b2a71e23adc002ac7fbe1a1042', '100'),
('q', 'q', '7694f4a66316e53c8cdd9d9954bd611d', '1'),
('raja', 'ramu', '58ecfdc7967e35bac8738978c0070a2c', '123456789'),
('viswa', 'shaneviswa90', 'ddbb86fee606c50d442f9b6847e526ee', '123456789'),
('test', 'test', '827ccb0eea8a706c4c34a16891f84e7b', '4000123412341234'),
('richierich', 'richierich1', 'e37730d26313eca8bda8e663f8310daa', '11111'),
('adf', 'dasf', '81dc9bdb52d04dc20036dbd8313ed055', '--'),
('hacker', 'hacker', 'd6a6bc0db10694a2d90e3a69648f3a03', '12345678'),
('you', 'you', '639bae9ac6b3e1a84cebb7b403297b79', '123'),
('admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1234'),
('admin2', 'admin2', 'c84258e9c39059a89ab77d846ddab909', '123'),
('abc', 'indk@ymail.com', '6505cc8caeb4b8555f4b2d5fb457238a', '378282246310005'),
('78', '78', '35f4a8d465e6e1edc05f3d8ab658c551', '78'),
('richierch', 'richierch', '4c4250a2745fccf994b003ce5b6e263f', '12334'),
('mayank__', 'mayank__', '4c730006c4b1e5ae7f1694b9cab05446', '123456789'),
('1111111', '111', '698d51a19d8a121ce581499d7b701668', '111111111111111111111111111'),
('0', '0', 'cfcd208495d565ef66e7dff9f98764da', '0'),
('1', '2', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '4'),
('01', '02', 'e45ee7ce7e88149af8dd32b27f9512ce', '04'),
('test', 'invisibleluv4u@gmail.com', '202cb962ac59075b964b07152d234b70', '1234567890'),
('ithunt2007@gmail.com', 'vibha', 'eb0a191797624dd3a48fa681d3061212', '1234567890'),
('ascii', 'ascii', '5b7f33be48f19c25e1af2f96cffc569f', '1234567890987654'),
('12345', '12345', '827ccb0eea8a706c4c34a16891f84e7b', '123456'),
('richerich', 'richerich', '8b9ce87a0ffc300a820e94e7931e2088', '234134'),
('satyam', 'satyam', '0f2cdafc6b1adf94892b17f355bd9110', '123456'),
('richie', 'richie', 'f4c40070ce44dc4fbbe16235f73f4dc6', '1313131313'),
('qwe', 'qwe', '76d80224611fc919a5d54f0ff9fba446', '123456'),
('Nakul Patel', 'nakul', '21af42a409a73bdfd15e80f57cb41e67', '123412341234789'),
('richierich', 'abcdefg', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890'),
('rch', 'richierich'' and 1!=1--', '202cb962ac59075b964b07152d234b70', '34324'),
('gsd', 'NOW()', '202cb962ac59075b964b07152d234b70', '123'),
('preethamms', 'preethamms', 'c07fefbae558f73d32686dec591af0ac', '100'),
('Dexter', 'jamesda', '8fedec948b0e98128fed1e790d0a3a72', '9894504932'),
('example', 'exam', '81dc9bdb52d04dc20036dbd8313ed055', '1021'),
('depp', 'dopemaster', 'f7e0df57be9b48080888ccc376bf9efb', '12334'),
('123', '<!--#exec cmd="ls -l"-->', '202cb962ac59075b964b07152d234b70', '123'),
('sebas', 'sebas', '0d40d9aea2b3b5a149dc34495fff0a0a', '1123'),
('poiuyt', 'poiuyt', 'e10adc3949ba59abbe56e057f20f883e', '123456789'),
('asd', 'asdasd', 'a3dcb4d229de6fde0db5686dee47145d', '321321321321'),
('asd', 'akash6190', 'e10adc3949ba59abbe56e057f20f883e', '123456'),
('ccc', 'ccc', '9df62e693988eb4e1e1444ece0578579', '123'),
('../pcsin', '../pcsin', '202cb962ac59075b964b07152d234b70', '123'),
('../../pcsin', '../../pcsin', '202cb962ac59075b964b07152d234b70', '123'),
('register.php', 'register.php', '202cb962ac59075b964b07152d234b70', '123'),
('../register.php', '../register.php', '202cb962ac59075b964b07152d234b70', '123'),
('../../register.php', '../../register.php', '202cb962ac59075b964b07152d234b70', '123'),
('../../../register.php', '../../../register.php', '202cb962ac59075b964b07152d234b70', '123'),
('login.php', 'login.php', '202cb962ac59075b964b07152d234b70', '123'),
('.htpasswd', '.htpasswd', '202cb962ac59075b964b07152d234b70', '123'),
('valid', 'valid', '202cb962ac59075b964b07152d234b70', '1233'),
('user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '1'),
('administrator', 'administrator', '7ac66c0f148de9519b8bd264312c4d64', '123456712345671'),
('anand', 'yesyaye', '9b62278113fb336d9399ef6c0f19100f', '123456'),
('alexavier', 'alexavier', '824d63731cb2a73b6f44f7df56e4b48c', '403726'),
('kishan', 'kishannageswaran', 'dcaf7b74aabe21bd137025fa946dfb9a', '675'),
('rajesh', 'rajesh', 'e360bc13bcba071f4746adbb334cd78e', '2378964923'),
('abcd', 'abcd123', 'e2fc714c4727ee9395f324cd2e7f331f', '1234'),
('r', 'r', '4b43b0aee35624cd95b910189b3dc231', '1222'),
('asd', 'dfrwef', '81dc9bdb52d04dc20036dbd8313ed055', '45463565'),
('richie', '''richierich''', '4a621342de0b91d567690bd43e0c8894', '29384923489'),
('abhineet', 'adityagoyal', '057829fa5a65fc1ace408f490be486ac', '1122334455'),
('abhineet', 'abhineet', '213cfffef47dd03522a5fa2d82dc9565', '1122334455'),
('asdf', 'asdf', '912ec803b2ce49e4a541068d495ab570', '123456789'),
('sa', 'sachin.thebeast@gmail.com', '99feaba9c9dfac6c6ba036dee6d02dc1', '33231'),
('shiva', 'seek', 'e6f6362248805a36c61d205dbc6f4076', '123123132'),
('qwe', 'zzxz', 'd785c99d298a4e9e6e13fe99e602ef42', '1111222233334444'),
('qwe', 'xxzx', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '1111111111111111'),
('123asd', '123asd', 'e120ea280aa50693d5568d0071456460', '1111222233334444'),
('zzz', 'zzz', '25ed1bcb423b0b7200f485fc5ff71c8e', '123'),
('Draco', 'draco', '81dc9bdb52d04dc20036dbd8313ed055', '2345566789932'),
('richierich', 'catabre', '8b64d2451b7a8f3fd17390f88ea35917', '38923237574'),
('richierich', 'nikx', 'e37730d26313eca8bda8e663f8310daa', '989'),
('sudeep', 'sudeep', '6f19141c521a8d45ec9335fc2c19538f', '5435378217026461'),
('vishnu', 'vishnuks.mec@gmail.com', '6363cdf2bab4de34777823b45504a8eb', '123456789'),
('Anirudh', 'ratakonda', '734379e382de4feb0dce07cb1061ef48', '44444'),
('vivek_jonam', 'vivek_jonam', '900150983cd24fb0d6963f7d28e17f72', '1234567890'),
('sudeep', 'lucky', '339a65e93299ad8d72c42b263aa23117', '12345'),
('v', 'v', '80c9ef0fb86369cd25f90af27ef53a9e', '11111111111111'),
('12', '12', 'c20ad4d76fe97759aa27a0c99bff6710', '1'),
('ram', 'raman', '734379e382de4feb0dce07cb1061ef48', '23456'),
('noob42343', 'noob42', '4c895f90198604c7e28774723bf7716b', '123123123'),
('vaibhav', 'rudolf', '1e9726540dc3d01d718294f18a74fa43', '1111111111111111111'),
('k', 'k', '8ce4b16b22b58894aa86c421e8759df3', '1'),
('gokul', 'blah', '912ec803b2ce49e4a541068d495ab570', '1234');
