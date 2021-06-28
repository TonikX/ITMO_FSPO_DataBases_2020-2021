package ru.art3aofficial.rpm.lab.three.Game;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import ru.art3aofficial.rpm.lab.three.Data.IRepository;
import ru.art3aofficial.rpm.lab.three.Entities.Entity;
import ru.art3aofficial.rpm.lab.three.Entities.PlayerEntity;

public class GameServer {
    private GameConfig config;
    private IRepository repository;
    private World serverWorld;
    private int serverTicks = 0;

    private static GameServer instance;

    public GameServer(IRepository repository) {
        this.repository = repository;

        instance = this;
    }
    
    public void updateServer() {
        serverWorld.update();

        // Removing dead
        for(Entity entity : serverWorld.getEntities()){
            if(entity.getHealth() <= 0){
                try{
                    repository.removeEntity(entity);
                }catch (IOException e){
                    System.out.println(e.getMessage());
                }
            }
        }

        serverWorld.getEntities().removeIf(entity -> {
            return entity.getHealth() <= 0;
        });

        // Save
        if(serverTicks % config.getSavePeriod() == 0){
            try{
                repository.saveWorld(serverWorld);
            }catch(IOException e){
                System.out.println("Error while saving world: " + e.getMessage());
            }
            
        }
        serverTicks++;
    }

    public void loadConfig(int id) throws IOException{
        GameConfig newConfig = repository.loadConfig(id);

        if(newConfig != null){
            this.config = newConfig;
            return;
        }

        this.config = new GameConfig("127.0.0.1", 25565, 2, 1000, 2000);

    }

    public void loadWorld(int id) throws IOException{
        try{
            World newWorld = repository.loadWorld(id);
            if(newWorld != null){
                this.serverWorld = newWorld;
                return;
            }
        }catch(IOException e){
            List<Entity> entities = new ArrayList<Entity>();

            World world = new World("Simple World", entities, null);

            createEntity("Agent 1", 15.0, 5.0, true, 30, 30, 10, world, null);
            createEntity("Agent 2", 5.0, 5.0, true, 30, 30, 10, world, null);
            createPlayerEntity("Pudge", 0.0, 0.0, 100, 100, 20, "Art3A", world, null);

            this.serverWorld = world;
        }
    }

    private void createEntity(String title, double posX, double posZ, boolean agressive, int maxHealth, int health,
        int attackDamage, World world, Integer id) throws IOException{
        
        Entity entity = new Entity(title, posX, posZ, agressive, maxHealth, health, attackDamage, world, id);
        repository.addEntity(entity);
        world.addEntity(entity);
    }

    private void createPlayerEntity(String title, double posX, double posZ, int maxHealth, int health,
        int attackDamage, String nickname, World world, Integer id) throws IOException{
        
        PlayerEntity entity = new PlayerEntity(title, posX, posZ, maxHealth, health, attackDamage, nickname, world, id);
        repository.addEntity(entity);
        world.addEntity(entity);
    }

    public static GameServer getInstance(){
        return instance;
    }

    public GameConfig getConfig(){
        return this.config;
    }

    @Override
    public String toString() {
        return "GameServer [config=" + config + ", serverTicks=" + serverTicks + ", serverWorld=" + serverWorld + "]";
    }
}
