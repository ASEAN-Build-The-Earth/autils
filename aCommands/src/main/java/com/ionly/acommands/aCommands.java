package com.ionly.acommands;

import org.bukkit.Bukkit;
import org.bukkit.ChatColor;
import org.bukkit.command.Command;
import org.bukkit.command.CommandSender;
import org.bukkit.entity.Player;
import org.bukkit.plugin.java.JavaPlugin;


public final class aCommands extends JavaPlugin {

    @Override
    public void onEnable() {
        System.out.println("[aCommands] aCommand V2.0 by iOnly");
        System.out.println("[aCommands] aCommands has been operated");
        System.out.println("[aCommands] attempting to connecting to Dashboard database.");
    }

    @Override
    public void onDisable() {
        System.out.println("[aCommands] attempting to disconnecting from Dashboard database.");
        System.out.println("Database was disconnected!");
    }

    @Override
    public boolean onCommand(CommandSender sender, Command command, String label, String[] args) {
        if (command.getName().equals("amenubruh")){
            if(sender instanceof Player){
                Player player = (Player) sender;
                Bukkit.broadcastMessage(ChatColor.GREEN + "[" + player.getDisplayName() +"]" + " was bruh to the whole server.");
            }else{
                System.out.println("Need to be player to use this command");
            }
        }

        if (command.getName().equals("autils-info")){
            if(sender instanceof Player){
                Player player = (Player) sender;
                player.sendMessage("aMenu V");
            }else{
                System.out.println("Need to be player to use this command");
            }
        }

        return false;
    }
}

