//index.js - Main file of ASEAN discord bot
//Made by CookieGMVN, StoneMc
//version 0.2
const fs = require('fs');
const Discord = require('discord.js');
const { prefix, token } = require('./config.json');
const moment = require('moment');
const cron = require('cron');
var XMLHttpRequest = require("xmlhttprequest").XMLHttpRequest;
var ip2 = 'asean.my.to';
const WOKCommands = require('wokcommands')
const client = new Discord.Client();
client.commands = new Discord.Collection();

const commandFiles = fs.readdirSync('./commands').filter(file => file.endsWith('.js'));

for (const file of commandFiles) {
  const command = require(`./commands/${file}`);
  client.commands.set(command.name, command);
}



client.once("ready", () => {
  console.log(client.user.username + ' has started');
  //const date = moment().format('lll');
  //client.user.setActivity('Started at ' + date, {
  //type: "PLAYING",
  //});
});
//WOK slash commands

//covid count code test
const axios = require('axios');
const countries = require("./countries.json");
const url = 'https://api.covid19api.com/total/country/';
const WAKE_COMMAND = '/cases';
client.on('message', async (msg) => {
  const content = msg.content.split(/[ ,]+/);
  if(content[0] === WAKE_COMMAND){
    if(content.length > 2){
      msg.reply("Too many arguments...")
    }
    else if(content.length === 1){
      msg.reply("Not enough arguments")
    }
    else if(!countries[content[1]]){
      msg.reply("Wrong country format")
    }
    else{
      const slug = content[1]
      const payload = await axios.get(`${url}${slug}`)
      const covidData = payload.data.pop();
      msg.reply(`Confirmed: ${covidData.Confirmed}, Deaths: ${covidData.Deaths}, Recovered: ${covidData.Recovered}, Active: ${covidData.Active} `)
    }
  }
});
//Status
function status(callback, ip) {
	var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET', 'https://mcapi.us/server/status?ip='+ip2, true);
      ourRequest.onload = () => {
		var ourData = JSON.parse(ourRequest.responseText);
		callback(null, checkStatus(ourData));
    };
	ourRequest.onerror = function() {
  		console.error(ourRequest.statusText);
	};
    ourRequest.send();
}

function checkStatus(data){
	if(data.online){
		if (data.players.max === 0){
			return "The server is offline.";
		}
		else {
			return "The MC server is online, players currently online: " + data.players.now + " /" + data.players.max + " IP - a";
		}

	} else {
		return "server offline";
	}
}


client.on('ready', () => {
	console.log('The bot in online');
});

client.on('message', message => {
	var args = message.content.split(/[ ]+/);
	if(message.content === '/hello'){
		message.reply('Hello there');
	}
	if(message.content === '/status'){
			status((error, result) => {
				if (error) {
					message.channel.send("error!");
					return;
				}
			message.channel.send(result);
		}, ip2);
	}
});

  //event listener
  client.on('message', message => {
	if (!message.content.startsWith(prefix) || message.author.bot) return;
  
	const args = message.content.slice(prefix.length).trim().split(/ +/);
	const command = args.shift().toLowerCase();
	
	  if (command === 'send'){
		if (!message.member.roles.cache.some(role => role.name === 'Staff')) return;
	
  
			  function getUserFromMention(mention) {
	  if (!mention) return;
	  if (mention.startsWith('<@') && mention.endsWith('>')) {
		  mention = mention.slice(2, -1);
		  if (mention.startsWith('!')) {
			  mention = mention.slice(1);
		  }
		  return mention;
	  }
  }
  const user = getUserFromMention(args[0])
  let MessageDM = args[1]
  client.users.cache.get(user).send(MessageDM);
	  }
  
  //cron jobs, send message hourly
	var CronJob = cron.CronJob;
  new CronJob('0 0 */1 * * *', function() {
			try {
			  const channel = client.channels.cache.get('820303612269953026');
			  channel.bulkDelete(1)
			  const date = moment().format('LLL'); 
				const Embed = new Discord.MessageEmbed()
	  .setColor('#00FFF')
	  .setTitle('ASEAN BTE')
	  .setImage('https://i.imgur.com/5DZueQQ.jpg')
	  .addFields(
		{ name: 'Total member:', value: `${message.guild.memberCount} `},
		{ name: 'Server name:', value: `${message.guild.name}` },
		{ name: 'Now time', value: date},
		)
	  .setFooter('Updated hourly, now time is '+ date)
  channel.send(Embed)
			} catch (e) {
				console.log(e);
			}
		}, function() {},
		true
	);
  
	if (message.content === `${prefix}join`) {
	  client.emit('guildMemberAdd', message.member);
	}
	if (!client.commands.has(command)) return;
  
	try {
	  client.commands.get(command).execute(message, args);
	} catch (error) {
	  console.error(error);
	  message.reply('There was an error trying to execute that command!');
	}
  }); 
//simple hi auto resonder

client.on('message', message => {

if (message.content === 'Hi') {
	message.channel.send('Hi :)');
}
});
client.on('message', message => {
	if (message.content === 'hi') {
		message.channel.send('Hi :)');
	}
	});

			



client.login(token) //login to the bot use token from config.json








