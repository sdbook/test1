#simple websockets brocaster
import asyncio
import websockets
clients = []

async def handler(websocket, path):
	print(path)
	if websocket not in clients:
		clients.append(websocket)
		
	async for message in websocket:
		print(message,'received from client')
		await brocast(message)
async def brocast(msg):
	print(msg,' brocasting')
	for websock in clients:
		try:
			await websock.send(msg)
		except websockets.exceptions.ConnectionClosed:
			print("Client disconnected.  Do cleanup")
			clients.remove(websock)
			pass
	
asyncio.get_event_loop().run_until_complete(
	websockets.serve(handler, 'localhost', 4545))
asyncio.get_event_loop().run_forever()
