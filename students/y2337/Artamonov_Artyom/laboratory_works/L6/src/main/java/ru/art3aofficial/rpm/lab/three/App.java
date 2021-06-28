package ru.art3aofficial.rpm.lab.three;

import java.io.IOException;

import ru.art3aofficial.rpm.lab.three.Data.DatabaseRepository;
import ru.art3aofficial.rpm.lab.three.Game.GameServer;


public class App
{
    public static void main( String[] args )
    {
        // Initialization
        GameServer serv = new GameServer(new DatabaseRepository("jdbc:sqlite:/home/artyom/Documents/study/rpm/lab3/lab-three/database.db"));

        try{
            serv.loadConfig(1);
            serv.loadWorld(1);
        }catch(IOException e){
            System.err.println(e.getMessage());
            return;
        }

        System.out.println(serv);

        // Main loop
        for (int i = 0; i < 15; i++) {
            System.out.println("\n");
            System.out.println("Tick " + (i + 1));
            serv.updateServer();

            try{
                Thread.sleep(serv.getConfig().getUpdatePeriod());
            }catch(InterruptedException e){
                System.out.println(e.getMessage());
            }
            
        }

        System.out.println(serv);
    }
}
