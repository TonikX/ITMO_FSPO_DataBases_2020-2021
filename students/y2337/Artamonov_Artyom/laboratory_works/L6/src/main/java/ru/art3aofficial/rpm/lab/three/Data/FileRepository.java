package ru.art3aofficial.rpm.lab.three.Data;

import java.io.File;
import java.io.IOException;

import ru.art3aofficial.rpm.lab.three.Entities.Entity;
import ru.art3aofficial.rpm.lab.three.Game.GameConfig;
import ru.art3aofficial.rpm.lab.three.Game.World;


//TODO: Implement file repository methods
public class FileRepository implements IRepository {

    private File path;

    public FileRepository(File path){
        this.path = path;
    }

    @Override
    public void saveConfig(GameConfig config) throws IOException {
        // TODO Auto-generated method stub
        
    }

    @Override
    public GameConfig loadConfig(int id) throws IOException {
        // TODO Auto-generated method stub
        return null;
    }

    @Override
    public void saveWorld(World world) throws IOException {
        // TODO Auto-generated method stub
        
    }

    @Override
    public World loadWorld(int id) throws IOException {
        // TODO Auto-generated method stub
        return null;
    }

    @Override
    public void addEntity(Entity entity) throws IOException {
        // TODO Auto-generated method stub
        
    }

    @Override
    public void removeEntity(Entity entity) throws IOException {
        // TODO Auto-generated method stub
        
    }

}
