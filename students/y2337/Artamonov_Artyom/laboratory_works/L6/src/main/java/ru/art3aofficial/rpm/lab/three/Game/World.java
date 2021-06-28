package ru.art3aofficial.rpm.lab.three.Game;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

import ru.art3aofficial.rpm.lab.three.Entities.Entity;

public class World {
    private static int idCounter = 1;

    private int id;
    private String worldName;
    private List<Entity> entities;

    public World(String name, List<Entity> entities, Integer id){
        this.entities = entities;
        this.worldName = name;
        this.id = id == null ? idCounter++ : id;
    }

    public void update(){
        for(Entity entity : entities){
            entity.update();
        }
    }

    public List<Entity> getEntitiesInRegion(int x, int z, double range){
        List<Entity> result = new ArrayList<Entity>();

        for(Entity entity : entities){
            double centerToPos = Math.sqrt(Math.pow(z - entity.posZ, 2) + Math.pow(Math.abs(x - entity.posX), 2));
            if(centerToPos < range){
                result.add(entity);
            }
        }
        return result;
    }

    public List<Entity> getEntitiesNearEntity(Entity entity, double range){
        List<Entity> result = new ArrayList<Entity>();
        double x = entity.posX;
        double z = entity.posZ;

        for(Entity e : entities){
            if(entity.id == e.id){
                continue;
            }
            double centerToPos = Math.sqrt(Math.pow(z - e.posZ, 2) + Math.pow(Math.abs(x - e.posX), 2));
            if(centerToPos < range){
                result.add(e);
            }
        }

        Collections.sort(result);
        return result;
    }

    public int getId(){
        return id;
    }

    public List<Entity> getEntities() {
        return entities;
    }

    public void setEntities(List<Entity> entities) {
        this.entities = entities;
    }

    public void addEntity(Entity entity){
        entities.add(entity);
    }

    public String getWorldName(){
        return worldName;
    }

    public void setWorldName(String newWorldName){
        worldName = newWorldName;
    }

    @Override
    public String toString() {
        return "World [entities=" + entities + ", worldName=" + worldName + "]";
    }
}
