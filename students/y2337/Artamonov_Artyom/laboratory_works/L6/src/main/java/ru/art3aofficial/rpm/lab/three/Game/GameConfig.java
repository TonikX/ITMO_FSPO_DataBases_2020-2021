package ru.art3aofficial.rpm.lab.three.Game;

public class GameConfig {
    private String ip = "127.0.0.1";
    private int port = 25565;
    private int difficulty = 2;
    private long updatePeriod = 1000;
    private int savePeriod = 5;

    public GameConfig(String ip, int port, int difficulty, long updatePeriod, int savePeriod) {
        this.ip = ip;
        this.port = port;
        this.difficulty = difficulty;
        this.updatePeriod = updatePeriod;
        this.savePeriod = savePeriod;
    }

    public String getIp() {
        return ip;
    }

    public int getDifficulty() {
        return difficulty;
    }

    public void setDifficulty(int difficulty) {
        this.difficulty = difficulty;
    }

    @Override
    public String toString() {
        return "GameConfig [difficulty=" + difficulty + ", ip=" + ip + ", port=" + port + ", savePeriod=" + savePeriod
                + ", updatePeriod=" + updatePeriod + "]";
    }

    public void setIp(String ip) {
        this.ip = ip;
    }

    public int getPort() {
        return port;
    }

    public void setPort(int port) {
        this.port = port;
    }

    public long getUpdatePeriod() {
        return updatePeriod;
    }

    public void setUpdatePeriod(long updatePeriod) {
        this.updatePeriod = updatePeriod;
    }

    public int getSavePeriod() {
        return savePeriod;
    }

    public void setSavePeriod(int savePeriod) {
        this.savePeriod = savePeriod;
    }
}
