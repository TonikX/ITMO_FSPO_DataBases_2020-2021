package ru.art3aofficial.rpm.lab.three.Data;

import java.io.IOException;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

import ru.art3aofficial.rpm.lab.three.Entities.Entity;
import ru.art3aofficial.rpm.lab.three.Game.GameConfig;
import ru.art3aofficial.rpm.lab.three.Game.World;

public class DatabaseRepository implements IRepository {

    private String url;

    public DatabaseRepository(String url) {
        this.url = url;

        // Test connection
        connect();
    }

    @Override
    public void saveConfig(GameConfig config) throws IOException {
        String query = "INSERT INTO gameconfig VALUES(?, ?, ?, ?, ?, ?)";

        try (Connection conn = this.connect();
                PreparedStatement pstmt = conn.prepareStatement(query)) {
            pstmt.setString(1, config.getIp());
            pstmt.setInt(2, config.getPort());
            pstmt.setInt(3, config.getDifficulty());
            pstmt.setLong(4, config.getUpdatePeriod());
            pstmt.setInt(5, config.getSavePeriod());
            pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }

    @Override
    public GameConfig loadConfig(int id) throws IOException {
        String query = "SELECT * FROM gameconfig WHERE id = ?";

        try (Connection conn = this.connect();
            PreparedStatement pstmt = conn.prepareStatement(query)) {
            ResultSet rs = null;
            
            pstmt.setInt(1, id);
            rs = pstmt.executeQuery();

            if(rs.next() == false){
                throw new IOException();
            }

            GameConfig config = new GameConfig(rs.getString("ip"),
                rs.getInt("port"),
                rs.getInt("difficulty"),
                rs.getLong("update_period"),
                rs.getInt("save_period"));

            return config;
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }

        return null;
    }

    @Override
    public void saveWorld(World world) throws IOException {
        if(isWorldExists(world.getId())){
            String query = "UPDATE world SET name = ? WHERE id = ?";

            try (Connection conn = this.connect();
                PreparedStatement pstmt = conn.prepareStatement(query)) {

                pstmt.setString(1, world.getWorldName());
                pstmt.setInt(2, world.getId());
                pstmt.executeUpdate();

                updateEntities(world.getEntities());
            } catch (SQLException e) {
                System.out.println(e.getMessage());
            }
        }else{
            String query = "INSERT INTO world VALUES(?, ?)";
            try (Connection conn = this.connect();
                PreparedStatement pstmt = conn.prepareStatement(query)) {

                pstmt.setString(1, world.getWorldName());
                pstmt.setInt(2, world.getId());
                pstmt.executeUpdate();

                updateEntities(world.getEntities());

            } catch (SQLException e) {
                System.out.println(e.getMessage());
            }
        }
        
        System.out.println("World saved");
    }

    @Override
    public World loadWorld(int id) throws IOException {
        String query = "SELECT * FROM world WHERE id = ?";

        World world = null;
        List<Entity> entities = new ArrayList<Entity>();

        try (Connection conn = this.connect();
            PreparedStatement pstmt = conn.prepareStatement(query)) {
            ResultSet rs = null;

            pstmt.setInt(1, id);
            rs = pstmt.executeQuery();

            if (rs.next() == false){
                throw new IOException();
            }

            world = new World(rs.getString("name"), entities, rs.getInt("id"));

        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }

        query = "SELECT * FROM entity WHERE world_id = ?";

        try (Connection conn = this.connect();
            PreparedStatement pstmt = conn.prepareStatement(query)) {
            ResultSet rs = null;

            pstmt.setInt(1, world.getId());
            rs = pstmt.executeQuery();

            while(rs.next()){
                entities.add(new Entity(rs.getString("title"),
                    rs.getDouble("pos_x"), rs.getDouble("pos_z"),
                    rs.getBoolean("agressive"), rs.getInt("max_health"),
                    rs.getInt("health"), rs.getInt("attack_damage"), world, rs.getInt("id")));
            }

            return world;
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }

        return null;
    }

    private void updateEntities(List<Entity> entities){
        for(Entity entity : entities){
            String queryEntities = "UPDATE entity SET title = ?, pos_x = ?," +
            " pos_z = ?, agressive = ?, max_health = ?, health = ?, attack_damage = ?, world_id = ? WHERE id = ?";
            
            try{
                Connection conn = this.connect();
                PreparedStatement st = conn.prepareStatement(queryEntities);

                st.setString(1, entity.getTitle());
                st.setDouble(2, entity.getPosX());
                st.setDouble(3, entity.getPosZ());
                st.setBoolean(4, entity.isAgressive());
                st.setInt(5, entity.getMaxHealth());
                st.setInt(6, entity.getHealth());
                st.setInt(7, entity.getAttackDamage());
                st.setInt(8, entity.getWorld().getId());

                st.setLong(9, entity.getId());

                st.executeUpdate();

            }catch (SQLException e) {
                System.out.println(e.getMessage());
            }
        }
    }

    private Boolean isWorldExists(int id){
        String query = "SELECT * FROM world WHERE id = ?";

        try (Connection conn = this.connect();
            PreparedStatement pstmt = conn.prepareStatement(query)) {
            ResultSet rs = null;

            pstmt.setInt(1, id);
            rs = pstmt.executeQuery();

            if (rs.next() == false){
                return false;
            }

            return true;
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }

        return false;
    }

    private Connection connect(){
        try{
            Connection conn = DriverManager.getConnection(url);
            return conn;
        } catch (SQLException e) {
            System.out.println(e.getMessage());
            return null;
        }
    }

    @Override
    public void removeEntity(Entity entity) throws IOException {
        String query = "DELETE FROM entity WHERE id = ?";

        try (Connection conn = this.connect();
            PreparedStatement pstmt = conn.prepareStatement(query)) {

            pstmt.setLong(1, entity.getId());
            pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
    }

    @Override
    public void addEntity(Entity entity) throws IOException {
        String query = "INSERT INTO entity VALUES(?,?,?,?,?,?,?,?,?)";

        try (Connection conn = this.connect();
            PreparedStatement st = conn.prepareStatement(query)) {

            st.setLong(1, entity.getId());
            st.setString(2, entity.getTitle());
            st.setDouble(3, entity.getPosX());
            st.setDouble(4, entity.getPosZ());
            st.setBoolean(5, entity.isAgressive());
            st.setInt(6, entity.getMaxHealth());
            st.setInt(7, entity.getHealth());
            st.setInt(8, entity.getAttackDamage());
            st.setInt(9, entity.getWorld().getId());

            st.executeUpdate();
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        
    }
    
}
