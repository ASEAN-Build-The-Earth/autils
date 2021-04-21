package com.ionly.acommands.events;

import org.bukkit.ChatColor;
import org.bukkit.entity.Player;
import org.bukkit.event.EventHandler;
import org.bukkit.event.Listener;
import org.bukkit.event.player.PlayerJoinEvent;

public class PlayerJoin implements Listener {
    int aAccLvl = 1;

    @EventHandler
    void onPlayerJoin(PlayerJoinEvent e){
        Player player = e.getPlayer();
        e.setJoinMessage(ChatColor.GREEN + player.getDisplayName() + "join the server");
        player.sendMessage("aAccount Level" + aAccLvl);
    }
}
