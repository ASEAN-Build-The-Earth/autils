const Discord = require('discord.js');
module.exports = {
  name: 'Rules1asg',
  description: 'The first rule cat',
  execute(message){
const faq1 = new Discord.MessageEmbed()
.setColor('#00FFFF')
.setAuthor(`${message.author.username}`, `${message.author.displayAvatarURL({ dynamic: true })}`)
.setTitle ('Rules (1a')
    .addFields( 
      {name: "Rule #1 Respect:", value: "Please treat everyone with respect.\nToxicity, racism, impersonation, prejudice or any other negative points are disallowed in this community."},
      {name: "Rule #2 Discussion", value:" Discussions of heavy topics such as politics are not allowed in this community.\nWe highly encourage discussions related to Singapore BTE."},
      {name: "1. How to Contribute?", value: "Join this server https://discord.gg/Mg54bVk and follow the instructions given"},
      {name: "1. How to Contribute?", value: "Join this server https://discord.gg/Mg54bVk and follow the instructions given"},
      {name: "1. How to Contribute?", value: "Join this server https://discord.gg/Mg54bVk and follow the instructions given"},
      {name: "1. How to Contribute?", value: "Join this server https://discord.gg/Mg54bVk and follow the instructions given"},
      {name: "1. How to Contribute?", value: "Join this server https://discord.gg/Mg54bVk and follow the instructions given"},
      {name: "1. How to Contribute?", value: "Join this server https://discord.gg/Mg54bVk and follow the instructions given"},
      
      )
   .setFooter('Last updated on 22/3/2021','https://images-ext-1.discordapp.net/external/j2-U816cNP_653mZv8L7hc1Q6TN6D9NhahEx5QMjPYs/%3Fsize%3D128/https/cdn.discordapp.com/icons/702883639574396969/0a9741c68d97fd00de8458d20fd9b513.png');
   message.channel.send(faq1);
}
}
