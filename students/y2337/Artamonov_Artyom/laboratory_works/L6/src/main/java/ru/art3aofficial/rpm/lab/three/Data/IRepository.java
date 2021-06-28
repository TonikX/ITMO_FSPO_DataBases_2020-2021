package ru.art3aofficial.rpm.lab.three.Data;

import java.io.IOException;

import ru.art3aofficial.rpm.lab.three.Entities.Entity;
import ru.art3aofficial.rpm.lab.three.Game.GameConfig;
import ru.art3aofficial.rpm.lab.three.Game.World;

public interface IRepository {
    void saveConfig(GameConfig config) throws IOException;
    GameConfig loadConfig(int id) throws IOException;
    
    void saveWorld(World world) throws IOException;
    World loadWorld(int id) throws IOException;

    void addEntity(Entity entity) throws IOException;
    void removeEntity(Entity entity) throws IOException;
}
