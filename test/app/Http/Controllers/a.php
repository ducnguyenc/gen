<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Text;

class a extends Controller
{
    public function b()
    {
        $a = "Violation in the Code:
        In the startCar() method of the Owner class, there’s a direct violation of the LoD:
        PHP
        
        class Owner {
            public function startCar() {
                // Violation: Reaching deep into the Car object to access the Engine object
                auth()->user->car->engine;
            }
        }
        AI-generated code. Review and use carefully. More info on FAQ.
        The violation occurs when the Owner object reaches through the car object to access the engine object directly.
        According to the LoD, an object should only talk to its immediate friends (i.e., its own properties or methods) and avoid reaching into other objects’ internals.
        How to Fix It:
        To adhere to the LoD, modify the Owner class to avoid reaching deep into the object hierarchy:
        PHP
        
        class Owner {
            public function startCar() {
                // Instead, ask the Car object to start the engine
                this->car->startEngine();
            }
        }
        AI-generated code. Review and use carefully. More info on FAQ.
        In this corrected version, the Owner object communicates with its immediate friend (car) and delegates the responsibility of starting the engine to the Car object.";
        return view('b', ['a' => $a]);
    }
}
