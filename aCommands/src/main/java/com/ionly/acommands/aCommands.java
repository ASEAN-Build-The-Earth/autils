package com.ionly.acommands;

import com.ionly.acommands.sql.MySQL;
import org.bukkit.Bukkit;
import org.bukkit.ChatColor;
import org.bukkit.command.Command;
import org.bukkit.command.CommandSender;
import org.bukkit.entity.Player;
import org.bukkit.plugin.java.JavaPlugin;

import java.sql.SQLException;


public final class aCommands extends JavaPlugin {

    public MySQL SQL;

    @Override
    public void onEnable() {
        System.out.println("[aCommands] aCommand V2021.1-b2.0.2003");
        System.out.println("[aCommands] aCommands has been operated");
        System.out.println("[aCommands] attempting to connecting to Dashboard database.");
        this.SQL = new MySQL();

        try {
            SQL.connect();
        } catch (ClassNotFoundException e) {
            //e.printStackTrace();
            Bukkit.getLogger().info("Database connecting abort! [!ERROR!]");
        } catch (SQLException throwables) {
            throwables.printStackTrace();
        }

        if (SQL.isConnected()) {
            Bukkit.getLogger().info("Gateway Opened! [aCommands > aUtils Database]");
            Bukkit.getLogger().info("Catching and preparing to connect to the aUtils Database");
            Bukkit.getLogger().info("the aUtils Database is connected with aCommands");
        }
    }

    @Override
    public void onDisable() {
        System.out.println("[aCommands] attempting to disconnecting from Dashboard database.");
        System.out.println("Database was disconnected!");
        SQL.disconnect();
    }

    @Override
    public boolean onCommand(CommandSender sender, Command command, String label, String[] args) {
        if (command.getName().equals("amenubruh")){
            if(sender instanceof Player){
                Player player = (Player) sender;
                player.sendMessage(ChatColor.AQUA + "You just bruh to the whole server");
                Bukkit.broadcastMessage(ChatColor.GREEN + "[" + player.getDisplayName() +"]" + " was bruh to the whole server.");
            }else{
                System.out.println("Need to be player to use this command");
            }
        }

        if (command.getName().equals("autils-info")){
            if(sender instanceof Player){
                Player player = (Player) sender;
                player.sendMessage("aMenu V3.0.2");
                player.sendMessage("aCommands V2021.1-b2.0.2003");
                player.sendMessage("aDashBoard V2021.1-db1.1 | https://adashboard.ga");
            }else{
                System.out.println("aMenu V3.0.2 - aCommands V2021.1-b2.0.2003 - aDashBoard V2021.1-db1.1");
            }
        }

        if (command.getName().equals("bemonke")){
            if(sender instanceof Player){
                Player player = (Player) sender;
                player.sendMessage(ChatColor.GOLD + "u just transform urself the MONKE!!");
                player.setDisplayName(ChatColor.GOLD + "MONKE_" + player.getName());
            }else{
                System.out.println("Need to be player to use this command");
            }
        }

        return false;
    }
}

