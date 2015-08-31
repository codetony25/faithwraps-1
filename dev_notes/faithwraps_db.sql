-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: faithwraps
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galleries` (
  `gallery_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `desc` text NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES (1,'Traditional FaithWraps','The traditional FaithWrap is the original concept design by Faith Benoit. These wraps cover a wide variety of styles. If you\'re new to the site, start here and browse the different attributes of each gem. Pair them with your favorite ribbon to create the perfect FaithWrap combination for you.'),(2,'Limited Edition FaithWraps','The limited edition FaithWrap is a special collection designed from gems that are hard to find. Each new gem has a unique quality; whether it\'s for style or a new energy, there\'s one perfect for you. Check back often for new editions because once they\'re sold out, they\'re unlikely to return.'),(4,'Affirmations in a Bottle','Affirmations in a Bottle is the newest design to come to FaithWraps. It\'s not just a fashion statement - These bottles combine gems and powerful mantras to affirm the qualities within that we sometimes need to be reminded of. '),(3,'Leather & Feather','The Leather & Feather collection combine our favorite gems with rare feathers to create unique headbands, cuffs and earrings.');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gems`
--

DROP TABLE IF EXISTS `gems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gems` (
  `gem_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `desc` text,
  `colors` text NOT NULL,
  `energies` text NOT NULL,
  `chakras` text NOT NULL,
  PRIMARY KEY (`gem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gems`
--

LOCK TABLES `gems` WRITE;
/*!40000 ALTER TABLE `gems` DISABLE KEYS */;
/*!40000 ALTER TABLE `gems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_parts`
--

DROP TABLE IF EXISTS `order_parts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_parts` (
  `order_part_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_style_id` int(11) NOT NULL,
  PRIMARY KEY (`order_part_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_parts`
--

LOCK TABLES `order_parts` WRITE;
/*!40000 ALTER TABLE `order_parts` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_parts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `shipping` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `filled` int(11) NOT NULL DEFAULT '0',
  `shipped` int(11) NOT NULL DEFAULT '0',
  `tracking` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (15,65,1322083334,37.71,0.00,2.71,0,1,'01293420934234'),(16,69,1322324386,35.00,0.00,0.00,0,1,'0'),(17,70,1322503722,40.00,0.00,0.00,0,1,'0'),(18,72,1322507060,35.00,0.00,0.00,0,1,'0'),(19,73,1322617675,40.95,0.00,2.95,0,1,'0'),(24,74,1322970071,88.00,0.00,0.00,0,1,'03103200000027000710'),(25,75,1323094192,70.00,0.00,0.00,0,1,'03103200000027000734'),(26,76,1323583049,76.00,0.00,0.00,0,1,'03103200000027005128'),(27,76,1323909704,40.00,0.00,0.00,0,1,'03103200000027005630'),(28,79,1324049480,105.00,0.00,0.00,0,1,'03103200000027005937'),(29,80,1324065531,108.00,0.00,0.00,0,1,'03103200000027005944'),(30,77,1324086812,76.00,0.00,0.00,0,1,'95055000031181353001000'),(31,77,1324434207,70.00,0.00,0.00,0,1,'03103200000027007894'),(32,82,1327028717,38.99,3.99,0.00,0,1,'03111660000211704793'),(33,84,1327252072,38.99,3.99,0.00,0,1,'03103200000027011631'),(34,85,1327725947,58.99,3.99,0.00,0,1,'03103200000027014526'),(35,87,1330354480,45.99,3.99,0.00,0,1,'03110820000184958240'),(36,88,1331487857,38.99,3.99,0.00,0,1,'03112550000117776048'),(37,89,1332173432,43.99,3.99,0.00,0,1,'03112550000117778097'),(38,1,1411588821,44.94,3.99,2.95,0,1,'3252525444');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_styles`
--

DROP TABLE IF EXISTS `product_styles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_styles` (
  `product_style_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `image` varchar(45) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`product_style_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_styles`
--

LOCK TABLES `product_styles` WRITE;
/*!40000 ALTER TABLE `product_styles` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_styles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `gem_id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `shipping` decimal(10,2) NOT NULL,
  `combined_shipping` decimal(10,2) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,0,0,'The Transformation Wrap','Whether you\\\'re seeking transformation, wanting clarity for the changes around you, or simply need to surround yourself with a healing color, Malachite is the perfect gem. There\\\'s no wonder why the ancients used this stone for their prized jewelry. Its brilliant green color is the perfect accessory for this holiday season. Pair it with our mistletoe hand-dyed ribbon and have that perfect discussion piece at your annual office party. Or give it as a gift to your best friend who deserves a meaningful holiday present this year. ',38.00,3.99,1.00),(2,0,0,'The Meditation Wrap','The fierce royal blue and golden specked lapis lazuli will be sure to catch anyone\\\'s eye. This beautiful rich stone will make any outfit pop. Wear it with a sleek black dress and a pair of blue pumps or dress it down and bring out your inner diva. The Meditation Wrap is sure to enrich your daily practice and outer goddess.',38.00,3.99,1.00),(3,0,0,'The Love Wrap','Welcome unconditional love into your life with this passionate piece. Every woman could use a little more love in her life and what better way than with The Love Wrap. Wear this rich pink stone with your favorite black or pink top. Rhodonite and its feminine charm are bound to dazzle any wardrobe with a boost of goddess energy. Pair it with our Raven hand-dyed ribbon for a sophisticated look or Blushing Bride for the special day.',38.00,3.99,1.00),(4,0,0,'The Tigress Wrap','The Tigress Wrap is a powerful combination of determination and beauty. With its satin gold brown colors, this gem is bound to enrich your sense of style. Combine it with our Rustic Gold hand-dyed ribbon and embrace your inner tigress. The Tigress Wrap enhances our fierce feminine energy with mental clarity, determination, confidence, and a touch of abundance. Everything a goddess forgets to embrace from time to time.',35.00,3.99,1.00),(5,0,0,'The Grounding Wrap','Add an instant touch of elegance to any outfit with The Grounding Wrap. Black is a classic color that never goes out of style.  This rich black color will now serve as your favorite basic yet give you powerful grounding energy in your fast-paced daily routine. Pair it with a hand-dyed Mistletoe silk ribbon for that perfect holiday accessory! ',35.00,3.99,1.00),(6,0,0,'The Creativity Wrap','Embrace this stone of honor and give your creative side a surge of energy! With our crazy schedules these days, we all could use a little boost. Energize your sacral chakra and find some time in your day to do something you love. The Creativity Wrap is the perfect way to add a dash of color to your wardrobe and lifestyle.',35.00,3.99,1.00),(7,0,0,'The Serenity Wrap','Throughout a busy day, a hardworking woman could use a piece of serenity. Whether you find yourself stressed in rush hour traffic, at work, or at home, blue lace agate can help with your anxieties. Its soothing blue color will complement any pastel palette or vintage dress you\\\'ve been dying to wear. Wear it with our Wonderland hand-dyed ribbon and highlight your winter wonderland wardrobe this holiday season.',38.00,3.99,1.00),(8,0,0,'The Self Love Wrap','The Self Love Wrap is the perfect way to add a touch of Victorian elegance and self love. Its soft pink color will compliment all of our fun feminine pieces while surrounding ourselves with soothing love. Rose Quartz is a timeless stone that is bound to make any outfit chic. Indulge in your inner and outer beauty with this exquisite gem. Wear it with our hand-dyed Blushing Bride ribbon for that special day.',38.00,3.99,1.00),(9,0,0,'The Lucky Wrap','Take home a little bit of luck with Aventurine! We all need some good fortune in our lives now and then and this gem is the perfect tool to realize those affirmations. Welcome opportunity and wealth at your door with The Lucky Wrap. Pair this beautiful pastel green stone with a ballet slipper hand-dyed ribbon for a vintage look. ',35.00,3.99,1.00),(1001,0,0,'The Healing Wrap','Take home a piece of glitz and glamor with Goldstone. This beautiful stone will be sure to add some shimmer to any holiday outfit. Wear it with our hand-dyed Raven ribbon and awe at it\\\'s sparkle!',35.00,0.00,0.00),(5001,0,0,'The Dream Wrap','Get lost in this exquisite one-of-a-kind gem. Labradorite is definitely a piece you\\\'ll want to show off time and time again. Pair it with a hand-dyed Raven ribbon and let it\\\'s flashes of color shine. ',50.00,0.00,0.00),(5002,0,0,'The Peace Wrap','Flower Sugilite is perfect for that flower child! This lovely purple stone will make a great addition to any sundress or flowy blouse. Pair it with our Orchid Ivory hand-dyed ribbon for a beautiful soft look.',38.00,0.00,0.00),(10,0,0,'The Protection Wrap','For us weary travelers, The Protection Wrap will give it\\\'s wearer a boost of courage in style. This beautiful serene looking stone is the perfect addition to your favorite pair of jeans. Wear it with our hand-dyed Rainforest ribbon and make any basic outfit pop.',40.00,0.00,0.00),(11,0,0,'The Snow Wrap','Let it snow! Let it snow! Let is snow with The Snow Wrap! The beautiful snow quartz is true to its name and resembles a fresh sheet of pure snow. Pair it with our hand-dyed Mistletoe ribbon for that perfect holiday accessory! It\\\'s fluffy white charm will sure to be the talk of your holiday studded evening. ',35.00,3.99,1.00),(5004,0,0,'The Paua Shell Wrap','Bring the serenity of the ocean to your hands with the paua shell. This stunning shell, only found on the shores of New Zealand, will capture your gaze the entire day. It\\\'s brilliant shimmering colors will make any ordinary outfit come to life. Wear it with our Purple Lush or Raven hand-dyed ribbon to really bring out the paua shell\\\'s majestic beauty.',35.00,3.00,1.00),(9000,0,0,'reserved','',0.00,0.00,0.00),(12,0,0,'The Relaxation Wrap','Keep a small piece of R&amp;R at your wrist with The Relaxation Wrap. Poppy Jasper reminds us to put some time aside for ourselves and find our inner peace. The stone\\\'s rich red tones make a beautiful addition to your neutral wardrobe.',35.00,0.00,0.00),(1002,0,0,'The Expression Wrap','Whether you need to clear your mind, instill a boost of confidence, or say the words you\\\'ve been meaning to say, The Expression Wrap is the perfect piece. Sodalite and it\\\'s purple-blue color will brighten any outfit. Make a statement with our hand-dyed Rainforest ribbon.',35.00,3.99,1.00),(1003,0,0,'The Balance Wrap','Bring some stability to your life with The Balance Wrap. We all need to find our center from time to time and what better way than with laguna agate. This mesmerizing gem will splash color to any outfit. Wear it with our hand-dyed river stone ribbon for your daily practice.',35.00,3.99,1.00),(1004,0,0,'The Attraction Wrap','Feel pretty in pink with The Attraction Wrap. For those who have lost contact with your inner diva, the powerful Rhodochrosite will add some definite goddess energy to your life. This exquisite pink gem will make the perfect accessory for all your feminine outfits. Pair it with our hand-dyed electric guitar ribbon and rock out.',40.00,3.99,1.00),(9002,0,0,'The Sacred Wrap','Bring some noble wisdom into your life with The Sacred Wrap. Whether you seek courage, communication, or self-realization, the stone serves as a beautiful companion. Turquoise grows closer to it\\\'s wearer with age. This timeless designer gem is sure to enrich your wardrobe and sense of style. Wear it with our hand-dyed Rainforest ribbon to bring out its stunning color.',42.00,0.00,0.00),(9003,0,0,'The Lucky Valentine\'s Wrap','Take home a little bit of luck with Aventurine! We all need some good fortune in our lives now and then and this gem is the perfect tool to realize those affirmations. Welcome opportunity and wealth at your door with The Lucky Wrap. Pair this beautiful pastel green stone with a ballet slipper hand-dyed ribbon for a vintage look. ',35.00,0.00,0.00),(9004,0,0,'The Meditation Valentine\'s Wrap','The fierce royal blue and golden specked lapis lazuli will be sure to catch anyone\\\'s eye. This beautiful rich stone will make any outfit pop. Wear it with a sleek black dress and a pair of blue pumps or dress it down and bring out your inner diva. The Meditation Wrap is sure to enrich your daily practice and outer goddess.',38.00,0.00,0.00),(9005,0,0,'The Serenity Valentine\'s Wrap','Throughout a busy day, a hardworking woman could use a piece of serenity. Whether you find yourself stressed in rush hour traffic, at work, or at home, blue lace agate can help with your anxieties. Its soothing blue color will complement any pastel palette or vintage dress you\\\'ve been dying to wear. Wear it with our Wonderland hand-dyed ribbon and highlight your winter wonderland wardrobe this holiday season.',38.00,0.00,0.00),(9006,0,0,'The Grounding Valentine\'s Wrap','Add an instant touch of elegance to any outfit with The Grounding Wrap. Black is a classic color that never goes out of style.  This rich black color will now serve as your favorite basic yet give you powerful grounding energy in your fast-paced daily routine. Pair it with a hand-dyed Mistletoe silk ribbon for that perfect holiday accessory! ',35.00,0.00,0.00),(1005,0,0,'The Ocean Wrap','Bring the serenity of the ocean to your hands with the abalone shell. This stunning natural shell will capture your gaze the entire day. It\\\'s brilliant shimmering colors will make any ordinary outfit come to life. Wear it with our Rustic Gold hand-dyed ribbon to really bring out the abalone shell\\\'s majestic beauty.',35.00,0.00,0.00),(1006,0,0,'The Ancients\' Wrap','Turquoise is considered one of the oldest stones used for protection by the ancients. It was also thought to be a symbol of wealth and courage. The stone carries great wisdom and truth for it\\\'s wearer. Turquoise stabilizes one\\\'s mood and is also great for preventing depression and panic attacks. The stone protects the wearer from negativity and promotes self-realization and communication.',38.00,0.00,0.00),(9001,0,0,'The Spirit Wrap','Get a surge of positivity with The Spirit Wrap. This drusy quartz brilliantly catches light with all of its crystals. There\\\'s not a more stunning way to dissolve your worry and stress and amplify positivity. Druzy Quartz is sure to dazzle your wardrobe with some glitz and glamour! Pair it with our hand-dyed River Stone ribbon for an exquisite accessory.',55.00,0.00,0.00),(9007,0,0,'The Mother\'s Wrap','The Mother Wrap is the perfect gift for that amazing mom in your life. With it\\\'s stunning iridescent  flashes of light, it serves as a reminder of the powerful goddess energy they possess. The rare rainbow moonstone will make any outfit come to life. Pair it with our Wonderland hand-dyed ribbon to bring out its blue flashes.',42.00,0.00,0.00),(9100,0,0,'Trust In A Bottle Necklace','Bring peace and intuition to your heart center with the Trust In A Bottle necklace. This adorable tiny bottle contains an affirmation on a hand-distressed scroll, which reads \\&quot;I trust my dreams and intuitions. I am destined for great things.\\&quot; The bottle also includes amethyst gems and an antique key on a 27\\&quot; antique chain. This little bottle is the perfect touch of vintage to any outfit, while reminding us to keep positive throughout the day. Pair it with the Strength In A Bottle ring for a cute key and lock affirmation set.',19.00,0.00,0.00),(9101,0,0,'Strength In A Bottle Necklace','Bring some inner strength to your heart center with the Strength In A Bottle necklace. This adorable tiny bottle contains an affirmation on a hand-distressed scroll, which reads \\&quot;I\\\'m strong, confident, fearless, and powerful. I\\\'m in control.\\&quot; The bottle also includes black tourmaline gems and an antique key on a 27\\&quot; antique chain. This little bottle is the perfect touch of vintage to any outfit, while reminding us to keep positive throughout the day. Pair it with the Strength In A Bottle ring for a cute key and lock affirmation set.',19.00,0.00,0.00),(9102,0,0,'Confidence In A Bottle Necklace','Bring your inner diva to your heart center with the Confidence In A Bottle necklace. This adorable tiny bottle contains an affirmation on a hand-distressed scroll, which reads \\&quot;I\\\'m beautiful, confident, appreciated, and admired. I\\\'m loved. I\\\'m perfection.\\&quot; The bottle also includes rose quartz gems and an antique key on a 27\\&quot; antique chain. This little bottle is the perfect touch of vintage to any outfit, while reminding us to keep positive throughout the day. Pair it with the Confidence In A Bottle ring for a cute key and lock affirmation set.',19.00,0.00,0.00),(9103,0,0,'Trust In A Bottle Ring','Bring peace and intuition to your finger tips with the Trust In A Bottle ring. This adorable tiny bottle contains an affirmation on a hand-distressed scroll, which reads \\&quot;I trust my dreams and intuitions. I am destined for great things.\\&quot; The bottle also includes amethyst gems and an antique heart lock on an antique adjustable ring. This little bottle is the perfect touch of vintage to any outfit, while reminding us to keep positive throughout the day. Pair it with the Strength In A Bottle necklace for a cute key and lock affirmation set.',14.00,0.00,0.00),(9104,0,0,'Strength In A Bottle Ring','Bring some inner strength to your finger tips with the Strength In A Bottle ring. This adorable tiny bottle contains an affirmation on a hand-distressed scroll, which reads \\&quot;I\\\'m strong, confident, fearless, and powerful. I\\\'m in control.\\&quot; The bottle also includes black tourmaline gems and an antique heart lock on an antique adjustable ring. This little bottle is the perfect touch of vintage to any outfit, while reminding us to keep positive throughout the day. Pair it with the Strength In A Bottle necklace for a cute key and lock affirmation set.',14.00,0.00,0.00),(9105,0,0,'Confidence In A Bottle Ring','Bring your inner diva to your finger tips with the Confidence In A Bottle ring. This adorable tiny bottle contains an affirmation on a hand-distressed scroll, which reads \\&quot;I\\\'m beautiful, confident, appreciated, and admired. I\\\'m loved. I\\\'m perfection.\\&quot; The bottle also includes rose quartz gems and an antique heart lock on an antique adjustable ring. This little bottle is the perfect touch of vintage to any outfit, while reminding us to keep positive throughout the day. Pair it with the Confidence In A Bottle necklace for a cute key and lock affirmation set.',14.00,0.00,0.00),(9106,0,0,'Trust In A Bottle Set','Bring peace and intuition to your heart center and finger tips with the Trust In A Bottle necklace and ring set. These adorable tiny bottles contain affirmations on hand-distressed scrolls, which read \\&quot;I trust my dreams and intuitions. I am destined for great things.\\&quot; The bottles also include amethyst gems. The ring is finished with an antique heart lock and an adjustable ring. The necklace comes with an antique key and  matching 27\\&quot; chain.  These exquisite bottles are the perfect touch of vintage to any outfit, while reminding us to keep positive throughout the day. ',30.00,0.00,0.00),(9107,0,0,'Strength In A Bottle Set','Bring some inner strength to your heart center and finger tips with the Strength In A Bottle necklace and ring set. These adorable tiny bottles contain affirmations on hand-distressed scrolls, which read \\&quot;I\\\'m strong, confident, fearless, and powerful. I\\\'m in control.\\&quot; The bottles also include black tourmaline gems. The ring is finished with an antique heart lock and an adjustable ring. The necklace comes with an antique key and matching 27\\&quot; chain.  These exquisite bottles are the perfect touch of vintage to any outfit, while reminding us to keep positive throughout the day. ',30.00,0.00,0.00),(9108,0,0,'Confidence In A Bottle Set','Bring your inner diva to your heart center and finger tips with the Confidence In A Bottle necklace and ring set. These adorable tiny bottles contain affirmations on hand-distressed scrolls, which read \\&quot;I\\\'m beautiful, confident, appreciated, and admired. I\\\'m loved. I\\\'m perfection.\\&quot; The bottles also include rose quartz gems. The ring is finished with an antique heart lock and an adjustable ring. The necklace comes with an antique key and matching 27\\&quot; chain.  These exquisite bottles are the perfect touch of vintage to any outfit, while reminding us to keep positive throughout the day. ',30.00,0.00,0.00),(9500,0,0,'Tigress Leather Cuff','Wrap yourself in feathers with this stylish leather cuff. It features brown pheasant feathers and a tiger\\\'s eye at it\\\'s core. The cuff is 1.5\\&quot; wide and adjusts from 6.5\\&quot; to 7.5\\&quot;. Wear it with any basic outfit with this rich handmade piece.',32.00,0.00,0.00),(9501,0,0,'The Leather Wrap','Elegance meets rocker chic with this exquisite piece. This handmade leather wrap features rich black feathers and a kyanite at it\\\'s core. Dress it up or wear it with your favorite vintage tee.',36.00,0.00,0.00),(9502,0,0,'The Grounding Cuff','Wrap yourself in feathers with this stylish leather cuff. It features green pheasant feathers and an onyx at it\\\'s core. The cuff is 1.5\\&quot; wide and adjusts from 6.5\\&quot; to 7.5\\&quot;. Wear any basic outfit with this rich handmade piece.',32.00,0.00,0.00),(9503,0,0,'Men\'s Arrowhead Wrap','Get in touch with your inner rocker with The Arrowhead Wrap. It\\\'s the perfect accessory for the stylish man in your life. It features a unique onyx arrowhead and red suede. It\\\'s sure to fit any man with an adjustable closure.',36.00,0.00,0.00),(9504,0,0,'Men\'s Grounding Cuff','This handsome leather cuff is sleek with a slight edge. It features a large onyx wrapped in red suede. It\\\'s sure to fit that special man in your life with an adjustable buckle closure. The grounding cuff is the perfect accessory for your favorite vintage tee and jeans.',30.00,0.00,0.00),(9505,0,0,'Brown Pheasant Headband','No matter what hair color you\\\'re rocking this season, embellish it with the brown pheasant headband. These beautiful natural brown feathers are sure to enhance any hair style. This elegant headband features an onyx gem and a 1.5\\&quot; wide headband lined with suede for maximum comfort.',0.00,0.00,0.00),(9506,0,0,'Green Pheasant Headband','Add some textured color to your locks.  These beautiful green pheasant and guinea feathers are sure to enhance any hair style. This elegant headband features an onyx gem and a 1.5\\&quot; wide headband lined with suede for maximum comfort.',0.00,0.00,0.00),(9507,0,0,'Green Pheasant Earrings','These elegant earrings feature a rich  emerald pheasant feather topped with an onyx gem.  Measuring at approximately 4.25&quot; long, these earrings are sure to bring the solid tops and dresses in your wardrobe to the next level.',18.00,0.00,0.00),(9508,0,0,'Brown Pheasant Earrings','Add some warmth to your profile with this rich pair. These earrings feature feathers topped with an onyx gem.  Measuring at approximately 4.5\\&quot; long, these earrings are sure to compliment all the neutrals in your wardrobe.',18.00,0.00,0.00),(9509,0,0,'Black Feather Earrings','These sleek black earrings make the perfect evening accessory.  Handmade with black labradorite gems, they are sure to add some sparkle to your night. Measuring at approximately 4.5\\&quot; long, these feathers easily create a stunning dramatic look.',17.00,0.00,0.00),(9510,0,0,'Layered Green Pheasant Earrings','These elegant earrings feature rich  emerald pheasant feathers topped with an onyx gem.  Measuring at approximately 5\\&quot; long, these earrings are sure to help create that dramatic evening look.',19.00,0.00,0.00),(9511,0,0,'Layered Black & White Earrings','Take elegance to the next level with stunning layered black and white feathers. Measuring at 4.75\\&quot;, these rare pheasant feathers will enrich any outfit.  Pair them with a bold solid top or dress for that desired dramatic look.',19.00,0.00,0.00),(9512,0,0,'Layered Black Earrings','These sleek black earrings make the perfect evening accessory.  Handmade with black labradorite gems, they are sure to add some sparkle to your night. Measuring at approximately 5\\&quot; long, the layered black feathers easily create a stunning dramatic look.',19.00,0.00,0.00),(9513,0,0,'Black & White Earrings','Take elegance to the next level with stunning black and white feathers. Measuring at 5&quot;, these rare pheasant feathers will enrich any outfit.  Pair them with a bold solid top or dress for that desired dramatic look.',19.00,0.00,0.00),(9514,0,0,'Orange Pheasant Earrings','Add a pop color to your wardrobe with this fun pair. This elegant set of earrings features an orange pheasant feather and an onyx gem. Measuring at 4.25&quot;, these feathers are sure to spice up your neutrals.',18.00,0.00,0.00),(9515,0,0,'Gold Pheasant Earrings','Add a pop color to your wardrobe with this fun pair. This elegant set of earrings features a gold pheasant feather and an onyx gem. Measuring at 4.5&quot;, these feathers are sure to spice up your neutrals.',18.00,0.00,0.00),(9109,0,0,'Luck in a Bottle Set','Bring opportunity and abundance to your heart center and finger tips with the Luck In A Bottle necklace and ring set. These adorable tiny bottles contain affirmations on hand-distressed scrolls, which read &quot;Doors are opening for me. Wealth is pouring into my life. I\'m lucky in every aspect.&quot; The bottles also include aventurine gems. The ring is finished with an antique heart lock and an adjustable ring. The necklace comes with an antique key and  matching 27&quot; chain.  These exquisite bottles are the perfect touch of vintage to any outfit, while reminding us to keep positive throughout the day',30.00,0.00,0.00),(9110,0,0,'','',0.00,0.00,0.00),(9128,0,0,'Comfort in a Bottle Set','Bring some joy to your heart center and finger tips with the Comfort In A Bottle necklace and ring set. These adorable tiny bottles contain affirmations on hand-distressed scrolls, which read \"I\'m grateful for the people and things which bring joy to my life. My life is rich. I love being me.\" The bottles also include peridot gems. The ring is finished with an antique heart lock and an adjustable ring. The necklace comes with an antique key and  matching 27\" chain.  These exquisite bottles are the perfect touch of vintage to any outfit, while reminding us to keep positive throughout the day. ',30.00,0.00,0.00),(9126,0,0,'Clarity in a Bottle Set','Bring some focus and determination to your heart center and finger tips with the Clarity In A Bottle necklace and ring set. These adorable tiny bottles contain affirmations on hand-distressed scrolls, which read \"My inner vision is clear and focused. I\'m grounded, sharp, and determined. I\'m a pure force.\" The bottles also include tigers eye gems. The ring is finished with an antique heart lock and an adjustable ring. The necklace comes with an antique key and  matching 27\" chain.  These exquisite bottles are the perfect touch of vintage to any outfit, while reminding us to keep positive throughout the day. ',30.00,0.00,0.00);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `email` varchar(220) COLLATE latin1_general_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(220) COLLATE latin1_general_ci NOT NULL,
  `ip` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `product_last_viewed` int(11) NOT NULL DEFAULT '0',
  `first_name` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `address` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `address2` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `city` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `state` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `country` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `zipcode` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `b_first_name` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `b_last_name` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `b_address` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `b_address2` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `b_city` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `b_state` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `b_country` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `b_zipcode` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`email`),
  FULLTEXT KEY `idx_search` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (73,'deborah.peterson@live.com',1,'3dd75cc3798bf1c332e5e660e693e29ecebb290d3344a70f9','66.215.169.254',0,'Deborah','Peterson','5561 Western Avenue','','San Bernardino','CA','US','92407','Deborah','Peterson','5561 Western Avenue','','San Bernardino','CA','US','92407'),(1,'faithwraps@yahoo.com',5,'6ac8610f64c7f586b5c9ba9bbb0fb039d87fb680a7310c1b9','127.0.0.1',0,'Nate','Brady','17 chino','132','Chino','CA','US','91710','Nate','Brady','17 chino','132','Chino','CA','US','91710'),(69,'dennybenny@comcast.net',1,'4ed0a1f60e90c7a08434067cbd56d9352e6428fe6ade30897','50.131.179.233',0,'Denise','Benoit','29 Sacramento Street','','Cambridge','MA','US','02138','Denise','Benoit','29 Sacramento Street','','Cambridge','MA','US','02138'),(70,'poetbeau@aol.com',1,'e9555284346466e637ea214e7aec7492474b38fc9cfda387f','24.147.145.37',0,'Rene ','Benoit','18 Lynn Ellen','','Acushnet','MA','US','02743','Rene ','Benoit','18 Lynn Ellen','','Acushnet','MA','US','02743'),(65,'faithbenoit@aol.com',5,'6cba48172d3774bebce3e6221e457f931d84a593c64f9afca','76.172.65.176',0,'Faith','Benoit','11475 Central Ave','41','Chino','CA','US','91710','Faith','Benoit','11475 Central Ave','41','Chino','CA','US','91710'),(67,'fkiniklis@gmail.com',1,'6f07c0dcd99441085f441fb8a3340baabfe65d64743758820','75.131.200.41',0,'Francisco','Kiniklis','915 Crab Orchard Drive','','Roswell','GA','US','30076','','','','','','','',''),(84,'becky138@aol.com',1,'e66dcaf82dad29a7ff6b3aefdba2b35f0570d58f5d965c941','50.136.41.38',0,'Rebecca','Greene','34 Oaklawn Street','','New Bedford ','MA','US','02744','Rebecca','Greene','34 Oaklawn Street','','New Bedford ','MA','US','02744'),(83,'sazoo1114@aol.com',1,'4bfe7616d389c8061bd961b1f4aca2868b0a6022084964320','76.95.221.95',0,'','','','','','','','','','','','','','','',''),(74,'reikigal21@aol.com',1,'5da69b43f8452f20a453073b0b8aa388f6dc0414c3703a7a2','69.126.123.231',0,'Tara','Girouard','32 orchard hill lane','','Greenwich','CT','US','06831','Tara','Girouard','32 orchard hill lane','','Greenwich','CT','US','06831'),(75,'pamela.spirlet@gmail.com',1,'be1641b6b9048836eafa5f0d0d5f241d9c148d6a0d89efb53','76.19.201.174',0,'Pamela','Hutchinson','10 Beechwood Drive','NA','Acushnet','MA','US','02743','Pamela','Hutchinson','10 Beechwood Drive','NA','Acushnet','MA','US','02743'),(76,'maggielaing@gmail.com',1,'1c745ac2d10857fbf52ddedb13f8e9eb4bc2b3185e3687316','98.226.45.119',0,'Maggie','Laing','503 Green Street','','Dowagiac','MI','US','49047','Maggie','Laing','503 Green Street','','Dowagiac','MI','US','49047'),(77,'americansoldier121@yahoo.com',1,'7e98dffd13e54fb3abef18a3820f42a69718d8d5467962980','107.3.201.67',0,'Erin','DeSousa','5061 Collins st','A','Fort Campbell','KY','US','42223','Erin','DeSousa','5061 Collins st','A','Fort Campbell','KY','US','42223'),(79,'borgesrabgab@comcast.net',1,'e954ded3104612cb62e34e62678888b98f9bd8ed53515f5bf','76.118.113.8',0,'Gail','Borges','29 Castle Ave','','Fairhaven','MA','US','02719','Gail','Borges','29 Castle Ave','','Fairhaven','MA','US','02719'),(80,'bkopenhaver@yahoo.com',1,'c227acae0a0c302e22d83f7a7a9fbe3009206439fd4d0d814','216.165.126.25',0,'Brent','Kopenhaver Jr','448 Pine Run Rd','','Doylestown','PA','US','18901','Brent','Kopenhaver Jr','452 w 57th St','5E','New York','NY','US','10019'),(81,'test3@aol.com',1,'059f2c96b0288c3cb2c1bf2b585b7ce10f02bf33ee38a0ec0','76.172.65.176',0,'test','test','11475 Central Ave APT 41','','Chino','KY','US','91710','test','test','11475 Central Ave APT 41','','Chino','KY','US','91710'),(82,'leahisabelle@comcast.net',1,'8742fca0968e4919689812ce909a81113b7758c81682b1d94','76.118.114.67',0,'Leah','Isabelle','19 Shawmut Avenue','floor 1','New Bedford','MA','US','02740','Leah','Isabelle','70 Jouvette street','Floor 2','New Bedford','MA','US','02744'),(85,'migueldej@gmail.com',1,'c1036afc13d0722082816a72c257f52a9034d0c92af4540b9','108.41.19.182',0,'Miguel','De Jesus','67 Wall St','9i','New York','NY','US','10032','Miguel','De Jesus','67 Wall St','9i','New York','NY','US','10032'),(86,'jlclark13@gmail.com',1,'1e7c4344ddc5f0915108bb8e3693ced21c9027d9fbc6987ac','67.248.247.137',0,'','','','','','','','','','','','','','','',''),(87,'laf55@aol.com',1,'d823f8a85fd1fc08d0c04eef1d63e963895ef8b12053b2e95','74.92.51.18',0,'Lynne  ','Freitas','559 Ashley Blvd','','New Bedford','MA','US','02745','Lynne  ','Freitas','559 Ashley Blvd','','New Bedford','MA','US','02745'),(88,'katiebfreitas@gmail.com',1,'facf599b8ae93828d8f04abf7b130b113565e2b1f13d73af0','24.126.105.203',0,'Caitlyn ','Freitas','816 E Street NE','Apt 107','Washington ','DC','US','20002','Caitlyn ','Freitas','816 E Street NE','Apt 107','Washington ','DC','US','20002'),(89,'zzbet@aol.com',1,'0053fdc11c202fb8224b05d4862365e8008a113f8dd42c665','24.63.139.162',0,'Tracy','Grant','110 Merrill Lane','6','Dracut','MA','US','01826','Tracy','Grant','110 Merrill Lane','6','Dracut','MA','US','01826'),(90,'testuser@aol.com',1,'f791a73b3f1224187d8ca4b38ad0bb281cf8c0abb6b33b7e0','100.32.188.99',0,'','','','','','','','','','','','','','','',''),(91,'estilucy900@yahoo.com',1,'4d627f9f14147e2dd38605de52e5a03621e6457d077a542cf','172.56.39.50',0,'luciana','martinez','5050 Rhine Wine Dr.','','sparks','NV','US','89436','luciana','martinez','5050 Rhine Wine Dr.','','sparks','NV','US','89436');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-31  9:44:59
