#simple websockets brocaster
import asyncio
import websockets
clients = [] #to store all connected cleints

#handler for socket message activities
async def handler(websocket, path):
	print(path) #path is not used currently
	if websocket not in clients:
		clients.append(websocket) #append new cleint to the array
		
	async for message in websocket:
		print(message,'received from client') #print to console
		await brocast(message) #send message to all clents

async def brocast(msg):
	print(msg,' brocasting') #print to console

	#iterate the clients
	for websock in clients:
		try:
			await websock.send(msg) #send message to each client
		except websockets.exceptions.ConnectionClosed:
			#remove the client when it disconnects
			print("Client disconnected.  Do cleanup")
			clients.remove(websock)
			#pass

#starts the service and run forever
asyncio.get_event_loop().run_until_complete(
	websockets.serve(handler, 'localhost', 4545)) #hook to localhost:4545
asyncio.get_event_loop().run_forever()
