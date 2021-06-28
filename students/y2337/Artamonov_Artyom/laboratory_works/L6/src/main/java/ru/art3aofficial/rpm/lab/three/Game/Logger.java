package ru.art3aofficial.rpm.lab.three.Game;

import java.util.Date;

public class Logger implements ILogger {

    @Override
    public void log(String info) {
        System.out.println( "[" + new Date() + "]" + info);
    }
    
}
