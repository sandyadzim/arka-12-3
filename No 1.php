<?php
    function jsonBio(){

        $bio = [
            "name"      => "Sandy Rahmansyah",
            "age"       => 19,
            "address"   => "Jalan Jakarta Gang Perjuangan Blok 4 Nomor 1 RT72 Loa Bakung Samarinda",
            "hobbies"   => ["Nonton","Futsal","Begadang"],
            "is_married" => false,
            "school"    =>  array(
                                  array(
                                    "name" => "SMK Negeri 1 Samarinda",
                                    "year_in" => 2016,
                                    "year_out" => 2019,
                                    "major" => "Teknik Komputer dan Jaringan"
                                  )
                            ),
            "skills"    => array(
                                array(
                                    "skill_name" => "Front End",
                                    "level" => "beginner"
                                ),
                                array(
                                    "skill_name" => "Back End",
                                    "level" => "beginner"
                                ),
                            ),
            "interest_in_coding" => true
            ];
            return $bio;
    }
    echo json_encode(jsonBio());
?>