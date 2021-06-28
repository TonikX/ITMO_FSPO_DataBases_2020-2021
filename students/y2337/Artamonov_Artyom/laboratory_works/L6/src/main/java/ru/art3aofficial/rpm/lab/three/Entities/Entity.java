package ru.art3aofficial.rpm.lab.three.Entities;

import java.util.List;

import ru.art3aofficial.rpm.lab.three.Game.GameServer;
import ru.art3aofficial.rpm.lab.three.Game.ILogger;
import ru.art3aofficial.rpm.lab.three.Game.Logger;
import ru.art3aofficial.rpm.lab.three.Game.World;

public class Entity implements Comparable<Entity>{
    public final long id;

    protected World world;
    protected ILogger logger;

    protected static int idCounter = 1;
    protected String title;
    public double posX;
    public double posZ;
    protected boolean agressive;
    protected int maxHealth;
    protected int health;
    protected int attackDamage;
    protected Entity target;
    protected double entitySearchRange = 20; // Радиус поиска
    protected double entityAttackRange = 2; // Радиус атаки
    protected double speedX = 1; // сколько пройдет за тик
    protected double speedZ = 1;

    public Entity(String title, double posX, double posZ, boolean agressive, int maxHealth, int health,
            int attackDamage, World world, Integer id) {

        this.id = id == null ? idCounter : id;
        this.title = title;
        this.posX = posX;
        this.posZ = posZ;
        this.agressive = agressive;
        this.maxHealth = maxHealth;
        this.health = health;
        this.attackDamage = attackDamage;
        this.world = world;

        logger = new Logger();

        idCounter++;
    }

    public void update() {
        setTarget(world.getEntitiesNearEntity(this, entitySearchRange));
        if(target == null){
            logger.log(title + " has no target");
            return;
        }

        if(countLength(target) < entityAttackRange){
            attack(target);
        }else{
            walkTowards(target);
            logger.log(this.title + " walks towards " + target.title);
        }
    }

    public void walkTowards(Entity entity) {
        for(int i = 0; i < 2; i++){
            if(entity.posX < posX) {
                posX -= speedX;
            }else if(entity.posX > posX) {
                posX += speedX;
            }else{
                if(entity.posZ < posZ) {
                    posZ -= speedZ;
                }else if(entity.posZ > posZ) {
                    posZ += speedZ;
                }else {
                    // We are here!
                }
            }
        }
    }

    protected void attack(Entity entity) {
        entity.dealDamage(attackDamage + 0.5 * GameServer.getInstance().getConfig().getDifficulty());
        logger.log(this.title + " attacked " + entity.title);
        if(entity.health <= 0) {
            logger.log(entity.title + " was killed by " + this.title);
            this.target = null;
            return;
        }
        if(this.health <= 0) {
            logger.log(this.title + " was killed by " + entity.title);
            entity.target = null;
            return;
        }
    }

    // searchTarget
    protected void setTarget(List<Entity> entities) {
        if(entities.size() > 0){
            for(Entity e : entities){
                if(!e.isAgressive() || countLength(e) < entityAttackRange){
                    target = e; // Взять ближайшего или в поле аттаки
                    break;
                }
            }
        }else {
            target = null;
        }
        
    }

    protected final double countLength(Entity entity) {
        double length = Math.sqrt(Math.pow(entity.posX - posX, 2) + Math.pow(entity.posZ - posZ, 2));
        return length;
    }

    public static Entity copy(Entity source){
        return new Entity(source.title, source.posX, source.posZ, source.agressive, source.maxHealth, source.health, source.attackDamage, source.world, null);
    }

    @Override
    public String toString() {
        return "Entity [agressive=" + agressive + ", attackDamage=" + attackDamage + ", health=" + health + ", id=" + id
                + ", maxHealth=" + maxHealth + ", posX=" + posX + ", posZ=" + posZ + ", title=" + title + "]";
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public double getPosX() {
        return posX;
    }

    public void setPosX(double posX) {
        this.posX = posX;
    }

    public double getPosZ() {
        return posZ;
    }

    public void setPosZ(double posZ) {
        this.posZ = posZ;
    }

    public boolean isAgressive() {
        return agressive;
    }

    public void setAgressive(boolean agressive) {
        this.agressive = agressive;
    }

    public void toggleAgressive() {
        this.agressive = !this.agressive;
    }

    public int getMaxHealth() {
        return maxHealth;
    }

    public void setMaxHealth(int maxHealth) {
        this.maxHealth = maxHealth;
    }

    public int getHealth() {
        return health;
    }

    public void setHealth(int health) {
        this.health = health;
    }

    public void setHealth(double health) {
        this.health = (int)health;
    }

    // dealDamage наносит урон ЭТОЙ сущности, а не той, которую передаем
    public void dealDamage(double damage) {
        this.health -= damage;
    }

    public int getAttackDamage() {
        return attackDamage;
    }

    public void setAttackDamage(int attackDamage) {
        this.attackDamage = attackDamage;
    }

    @Override
    public int compareTo(Entity arg0) {
        return -(int)countLength(arg0);
    }

    public World getWorld() {
        return world;
    }

    public void setWorld(World world) {
        this.world = world;
    }

    public long getId() {
        return id;
    }
}
