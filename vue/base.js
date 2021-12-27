function baseOBJ() {
	var baseApp;
	const template=`
<form id='baseForm'>
編號<input type='text' v-model='dat.id' disabled ><br>
姓名<input type='text' v-model='dat.name'  /><br>
性別<select v-model='dat.sex'  ><option value='男'>男</option><option value='女'>女</option></select>
<br>
類別<select v-model='dat.type'  ><option v-for='rec in litOpts' :value='rec.v'>{{rec.o}}</option></select>
<br>
<hr style='clear:both;'/>
<input type='button' v-on:click='submitit()' value='Save'>
<br/>
</form>
`;
	
	this.loadRecord=function (id,div) {
		let elmnt = document.getElementById(div);
		/*search for elements with a certain atrribute:*/
		if (elmnt) {
			elmnt.innerHTML = template;
			let url="getData.php";
			fetch(url+"?id=" + id.toString())
			.then(function(resp){return resp.json();})
			.then(function(json) {
					//console.log(json.group_no);
					//return;
					baseApp=Vue.createApp( {
						data() {
							return {
								dat: json,
								xid: id,
								litOpts: [{v:1,o:'a'},{v:2,o:'b'},{v:3,o:'c'}]
							}
						},
						methods: {
							submitit() {									
								let mydat = new FormData();
								//console.log(this.dat);
								//this is one way
								mydat.append( "dat", JSON.stringify(this.dat) );
								mydat.append( "i", this.xid);
								
								/*
								//this is another way
								for (key in dat) {
									mydat.append(key, dat[key])
								}
								mydat.append( "i", this.xid);
								*/
								//console.log(mydat)
								let url="saveData.php";
								fetch(url,{
									method: 'POST', 
									body: mydat									
								})
								.then(function(res){return res.text(); })
								.then(function(data){ 
									console.log(data)
								})
							}
						}
					});
					baseApp.mount("#"+div);
				})
		} //end if
	} //end loadrecord
} //end of baseObj function
