package ru.art3aofficial.rpm.lab.three.Entities;

import ru.art3aofficial.rpm.lab.three.Game.World;

public class PlayerEntity extends Entity {
    private String nickname;
    private int regenCounter = 0;

    public PlayerEntity(String title, double posX, double posZ, int maxHealth, int health,
            int attackDamage, String nickname, World world, Integer id) {
        super(title, posX, posZ, false, maxHealth, health, attackDamage, world, id);
        this.nickname = nickname;
    }
    
    @Override
    public void update(){
        super.update();

        if(health < maxHealth){
            if (regenCounter % 2 == 0){
                health++;
                super.logger.log(this.title + " regens to " + this.health + "/" + this.maxHealth);
                regenCounter = 0;
            }
            regenCounter++;
        }
        
    }

    @Override
    public String toString() {
        return "PlayerEntity [" + super.toString() + ", nickname=" + nickname +"]";
    }
}
