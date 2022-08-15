<?php
//require_once "MyPDO.php";
//require_once "Room.php";
//
//$builds=["A","B","C","D"];
//foreach ($builds as $b) {
//    for($block=1; $block<=4; $block++) {
//        //jeden blok
//        for ($floor = 1; $floor <= 8; $floor++) {
//            //poschodie
//            for ($unit = 1; $unit <= 5; $unit++) {
//                //bunka
//                if ($unit != 3) {
//                    for ($room = 1; $room <= 2; $room++) {
//                        //izba
//                        $izba = new Room();
//                        $izba->setBuilding($b.$block);
//                        $izba->setUnit($floor.$unit);
//                        $izba->setRoom($room);
//                        $izba->save();
//                        echo "saved: ";
//                        echo $izba->getBuilding()." ";
//                        echo $izba->getUnit()." ";
//                        echo $izba->getRoom()."<br> ";
//                    }
//                }
//            }
//
//        }
//    }
//}