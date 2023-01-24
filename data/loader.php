<?php
    session_start();
    if(!isset($_SESSION["users"])) {
        $_SESSION["users"] = [
            "shehab" => [
                "id" => 1,
                "username" => "shehab",
                "password" => "12345",
            ],
            "maram" => [
                "id" => 2,
                "username" => "maram",
                "password" => "54321",
            ],
        ];

        $_SESSION["messages"] = [];

        $_SESSION["posts"] = [
            [
                "id" => 1,
                "title" => "MBTI Psychological Types",
                "body" => "Have you ever heard someone describe themselves as an INTJ or an ESTP and wondered what those cryptic-sounding letters could mean? What these people are referring to is their personality type based on the Myers-Briggs Type Indicator (MBTI)",
                "img" => "1.jpg",
                "user_id" => 1
            ],
            [
                "id" => 2,
                "title" => "Software Engineer",
                "body" => "As a software engineer, you'll work in a constantly evolving environment, due to technological advances and the strategic direction of the organisation you work for. You'll create, maintain, audit and improve systems to meet particular needs, often as advised by a systems analyst or architect, testing both hard and software systems to diagnose and resolve system faults",
                "img" => "4.jpg",
                "user_id" => 1
            ],
            [
                "id" => 3,
                "title" => "Physiognomy vs Graphology",
                "body" => "Two different methods for personality traits analysis",
                "img" => "3.jpg",
                "user_id" => 2,
            ]
        ];
    }
?>