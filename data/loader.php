<?php
    session_start();
    if(!isset($_SESSION["users"])) {
        $_SESSION["users"] = [
            "shehab mohamed" => [
                "id" => 1,
                "username" => "shehab mohamed",
                "password" => "123456",
            ],
            "maram emad" => [
                "id" => 2,
                "username" => "maram emad",
                "password" => "654321",
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
                "body" => "As a software engineer, you'll work in a constantly evolving environment, due to technological advances and the strategic direction of the organisation you work for. You'll create, maintain, audit and improve systems to meet particular needs, often as advised by a systems analyst or architect, testing both hard and software systems to diagnose and resolve system faults, simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum",
                "img" => "4.jpg",
                "user_id" => 1
            ],
            [
                "id" => 3,
                "title" => "Physiognomy vs Graphology",
                "body" => "Two different methods for personality traits analysis There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc, It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).",
                "img" => "3.jpg",
                "user_id" => 2,
            ]
        ];
    }
?>