class SpeedCheck extends React.Component{
    render() {
        return (
            <span className="speed" style={{marginLeft:10+'px'}}>
                <label>Speed Definition:&nbsp;</label>
                <select value={this.props.value} onChange={this.props.onChange()}>
                <option value="slow">Slow</option>
                <option value="normal">Normal</option>
                <option value="fast">Fast</option>
                </select>
            </span>
        );
    }
}

class NumTowers extends React.Component {
    render() {
        return (
            <span className="towers" style={{marginLeft: 10+'px'}}>
                <label>Number of Towers:&nbsp;</label>
                <select value={this.props.value} onChange={this.props.onChange()} disabled>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                </select>
            </span>
        );
    }
}

class PlayButton extends React.Component {
    render() {
        return (
            <button type="submit" className="play" onClick={()=>this.props.hC()}>{this.props.state}</button>
        )
    }
}

class Navigation extends React.Component {
    render() {
        return (
            <div className="nav" style={{marginBottom: 20 + 'px'}}>
                <SpeedCheck value={this.props.vs} onChange={()=> this.props.soC()}/>    
                <PlayButton hC={this.props.hC} state={this.props.state} />
            </div>
        );
    }
}

class Towers extends React.Component {
    render() {
        return (
            <div className="t" accessKey={this.props.value} ref={tower => {this.tower = tower;}}>
                <div className="pole"></div>
                <div className="base"></div>
                <div className="tower_name">{this.props.name}</div>
            </div>
        );
    }
}

class Platter extends React.Component {
    render() {
        var w = this.props.s;
        var p = this.props.p;
        var mt = this.props.t+25;
        var l = this.props.l;
        let c = "platter" + this.props.value + " platter";
        return (
            <div className={c} data-index={this.props.value} id={this.props.value+1} style={{width: w, textAlign: 'center', marginLeft: p, bottom: mt, left: '37.8%'}} data-node-index={this.props.value+1}></div>
        );
    }
}

class ToH extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            speed: 'normal',
            towers: 3,
            tContains: Array(3).fill('X'),
            btnState: 'Play',
            platters: [1, 2, 3],
        };
        this.handletChange = this.handletChange.bind(this);
        this.handlesChange = this.handlesChange.bind(this);
        this.handleClick = this.handleClick.bind(this);
    }
    componentDidMount(){
        var t
        for (var i = 0; i < this.state.towers; i++){
            t = 'tw'+i;
            this.setState({[t]: Array(1).fill(10)})
        }
    }
    renderTower(i) {
        return <Towers value={i+1} key={i+1} name={"Tower "+(i+1)}/>;
    }
    renderPlatter(i, wdth, pad, top, left) {
        return <Platter key={i} value={i} s={wdth} p={pad} t={top} l={left}/>;
    }
    handleClick = (event) => {
        if(this.state.btnState == 'Play'){
            this.setState({btnState: 'Pause'})
            this.startGame('started');
        }
        else{
            this.setState({btnState: 'Play'})
            this.startGame('paused');
        }
    }
    move = (d, ts, td, discs, end=false) => {
        if(td == 'tw0'){
            if(ts == 'tw1'){
                console.log('Move '+parseInt(d.getAttribute('data-index'))+' from '+ts+' to '+td)
                d.classList.remove('stayPut')
                d.classList.add('moveOff')
                // d.setAttribute('style', 'width: 40px; text-align: center; margin-left: 20px; bottom: 130px; left: 56.5%;');
                var st = setTimeout(()=>{
                    d.setAttribute('style', 'width: 40px; text-align: center; margin-left: 20px; bottom: 150px; left: 37.8%;');
                }, 1500)
                st
                var ts = setTimeout(()=>{
                    d.classList.add('moveOn')
                }, 3000)
                ts
                this.state.tw0.push(this.state.tw1.pop())
                var rem = setTimeout(()=>{
                    d.setAttribute('style', 'width: 40px; text-align: center; margin-left: 20px; left:37.8%; bottom:50px;');
                    d.classList.remove('moveOff','moveOn')
                },4000)
                rem
                var rem = setTimeout(()=>{
                    this.play(discs, parseInt(d.getAttribute('data-index'))+1)
                }, 5000)
            }else if(ts == 'tw2'){
                console.log('Move '+parseInt(d.getAttribute('data-index'))+' from '+ts+' to '+td)
            }
        }else if(td == 'tw1'){
            if(ts == 'tw2'){
                console.log('Move '+parseInt(d.getAttribute('data-index'))+' from '+ts+' to '+td)
                d.classList.remove('stayPut')
                d.classList.add('moveOff')
                // d.setAttribute('style', 'width: 40px; text-align: center; margin-left: 20px; bottom: 130px; left: 56.5%;');
                var st = setTimeout(()=>{
                    d.classList.add('moveRight_once')
                }, 1500)
                st
                var ts = setTimeout(()=>{
                    d.classList.add('moveOn')
                }, 3000)
                ts
                this.state.tw1.push(this.state.tw2.pop())
                var rem = setTimeout(()=>{
                    d.setAttribute('style', 'width: 40px; text-align: center; margin-left: 20px; left:47.3%; bottom:60px;');
                    d.classList.remove('moveOff','moveRight_once','moveOn')
                },4000)
                rem
                var rem = setTimeout(()=>{
                    this.play(discs, parseInt(this.state.tw1[this.state.tw1.length-1]+1))
                }, 5000)
            }else if(ts == 'tw0'){
                console.log('Move '+parseInt(d.getAttribute('data-index'))+' from '+ts+' to '+td)
                d.classList.remove('stayPut')
                d.classList.add('moveOff')
                var st = setTimeout(()=>{
                    d.classList.add('moveLeft_once')
                }, 1500)
                st
                var ts = setTimeout(()=>{
                    d.classList.add('moveOn')
                }, 3000)
                ts
                this.state.tw1.push(this.state.tw0.shift())
                var rem = setTimeout(()=>{
                    d.setAttribute('style', 'width: 60px; text-align: center; margin-left: 20px; left:46.4%; bottom:60px;');
                    d.classList.remove('moveOff','moveLeft_once','moveOn')
                    d.classList.add('stayPut')
                },4000)
                rem
                var rem = setTimeout(()=>{
                    this.play(discs, parseInt(d.getAttribute('data-index'))+1)
                }, 5000)
            }
            
        }else if(td == 'tw2'){
            if(ts == 'tw1'){
                console.log('Move '+parseInt(d.getAttribute('data-index'))+' from '+ts+' to '+td)
                d.classList.remove('stayPut')
                d.classList.add('moveOff')
                var st = setTimeout(()=>{
                    d.setAttribute('style', 'width: 60px; text-align: center; margin-left: 20px; left:56%; bottom:70px;');
                }, 1500)
                st
                var ts = setTimeout(()=>{
                    d.classList.add('moveOn')
                }, 3000)
                ts
                this.state.tw2.push(this.state.tw1.pop())
                var rem = setTimeout(()=>{
                    if(parseInt(d.getAttribute('data-index')) == 0)
                        d.setAttribute('style', 'width: 40px; text-align: center; margin-left: 20px; left:56.5%; bottom:50px;');
                    else if(parseInt(d.getAttribute('data-index')) == 2)
                        d.setAttribute('style', 'width: 80px; text-align: center; margin-left: 20px; left:55%; bottom:70px;');
                    else if(parseInt(d.getAttribute('data-index')) == 1)
                        d.setAttribute('style', 'width: 60px; text-align: center; margin-left: 20px; left:55.8%; bottom:75px;');
                    d.classList.remove('moveOff','moveLeft_twice','moveOn')
                    d.classList.add('stayPut')
                },4000)
                rem
            }else if(ts == 'tw0'){
                console.log('Move '+parseInt(d.getAttribute('data-index'))+' from '+ts+' to '+td)
                d.classList.remove('stayPut')
                d.classList.add('moveOff')
                var st = setTimeout(()=>{
                    d.classList.add('moveLeft_twice')
                }, 1500)
                st
                var ts = setTimeout(()=>{
                    d.classList.add('moveOn')
                }, 3000)
                ts
                this.state.tw2.push(this.state.tw0.shift())
                var rem = setTimeout(()=>{
                    if(parseInt(d.getAttribute('data-index')) == 0){
                        !end ? d.setAttribute('style', 'width: 40px; text-align: center; margin-left: 20px; left:56.5%; bottom:50px;'):d.setAttribute('style', 'width: 40px; text-align: center; margin-left: 20px; left:56.5%; bottom:80px;');
                    }
                    else if(parseInt(d.getAttribute('data-index')) == 2)
                        d.setAttribute('style', 'width: 80px; text-align: center; margin-left: 20px; left:55%; bottom:70px;');
                    else if(parseInt(d.getAttribute('data-index')) == 1)
                        d.setAttribute('style', 'width: 60px; text-align: center; margin-left: 20px; left:56.5%; bottom:50px;');
                    d.classList.remove('moveOff','moveLeft_twice','moveOn')
                    d.classList.add('stayPut')
                },4000)
                rem
            }
            if(end == false){
                var rem = setTimeout(()=>{
                    if(parseInt(d.getAttribute('data-index')) == 2)
                        this.play(discs)
                    else
                    this.play(discs, parseInt(d.getAttribute('data-index'))+1)
                }, 5000)
            }
        }
    }
    play(discs, val = 0) {
        if(this.state.tw0.length == 0){
            this.state.tw0.push(10)
            this.move(discs[val], 'tw1', 'tw0', discs)
        }
        var t = false
        while (t==false){
            var disc = discs[val]
            if(this.state.tw2.indexOf(2) > -1 && this.state.tw2.indexOf(3) > -1)
                this.move(discs[0], 'tw0', 'tw2', discs, true)
            if(parseInt(disc.getAttribute('data-node-index')) < parseInt(this.state.tw2[this.state.tw2.length-1])){
                if(this.state.tw0[0] == disc.getAttribute('data-node-index'))
                    this.move(disc, 'tw0', 'tw2', discs)
                else if(this.state.tw1[0] == disc.getAttribute('data-node-index'))
                    this.move(disc, 'tw1', 'tw2', discs)
                else if(this.state.tw1[this.state.tw1.length-1] == disc.getAttribute('data-node-index'))
                    this.move(disc, 'tw1', 'tw2', discs)
                    break;
            }else{
                if(parseInt(disc.getAttribute('data-node-index')) < parseInt(this.state.tw1[this.state.tw1.length-1])){
                    if(this.state.tw0[0] == disc.getAttribute('data-node-index'))
                        this.move(disc, 'tw0', 'tw1', discs)
                    else if(this.state.tw2[0] == disc.getAttribute('data-node-index'))
                        this.move(disc, 'tw2', 'tw1', discs)
                        break;
                }else{ // Going from bigger towers to smaller towers
                    val = 0
                    for(;val<discs.length;val++){
                        disc = discs[val]
                        if(parseInt(disc.getAttribute('data-node-index')) < parseInt(this.state.tw1[this.state.tw1.length-1])){
                            if(parseInt(this.state.tw2[this.state.tw2.length-1]) == parseInt(disc.getAttribute('data-node-index')))
                                this.move(disc, 'tw2', 'tw1', discs)
                            else if(parseInt(this.state.tw0[this.state.tw0.length-1]) == parseInt(disc.getAttribute('data-node-index')))
                                this.move(disc, 'tw0', 'tw1', discs)
                            break;
                        } else if(parseInt(disc.getAttribute('data-node-index')) < parseInt(this.state.tw2[this.state.tw2.length-1])){
                            if(parseInt(this.state.tw1[this.state.tw1.length-1]) == parseInt(disc.getAttribute('data-node-index')))
                                this.move(disc, 'tw1', 'tw2', discs)
                            else if(parseInt(this.state.tw0[this.state.tw0.length-1]) == parseInt(disc.getAttribute('data-node-index')))
                                this.move(disc, 'tw0', 'tw2', discs)
                            break;
                        } else if(parseInt(disc.getAttribute('data-node-index')) < parseInt(this.state.tw0[this.state.tw0.length-1])){
                            if(parseInt(this.state.tw1[this.state.tw1.length-1]) == parseInt(disc.getAttribute('data-node-index')))
                                this.move(disc, 'tw1', 'tw0', discs)
                            else if(parseInt(this.state.tw2[this.state.tw2.length-1]) == parseInt(disc.getAttribute('data-node-index')))
                                this.move(disc, 'tw2', 'tw0', discs)
                        }
                    }
                    
                }
            }
            if(val < discs.length)
                val++
            else val = 0
        }
    }
    startGame = (state) => {
        console.log('Tower of Hanoi simulation '+state+'.')
        if(state === 'started'){
            for(var i = 0; i < 3; i++)
                this.state.tw0.pop()
            for(var i = 0; i < 3; i++)
                this.state.tw0.push(this.state.platters.shift())
            var discs = []
            discs = document.getElementsByClassName('platter');
            for(var l = 0; l < discs.length; l++)
                discs[l].classList.add('stayPut');
            this.play(discs);
        } else {
            this.pause();
        }
    }
    handletChange(event) {
        this.setState({towers: parseInt(event.target.value)});
        this.setState({towerPresent: Array(parseInt(event.target.value)).fill('X')});
    }
    handlesChange(event){
        this.setState({speed: event.target.value});
    }
    getInitialState() {
        
    }
    render() {
        let wdth = 40;
        let pad = 20;
        let top = 60;
        let left = 24+'%';
        var t = [];
        var p = [];
        for (var i = 0; i < this.state.towers; i++){
            t.push(this.renderTower(i));
        }
        for (var i = 0; i < 3; i++) {
            p.push(this.renderPlatter(i, wdth, pad, top, left));
            top -= 5;
            wdth += 20;
            pad -= 10;
        }
        t.push(p);
        return (
            <div className="toh">
                <Navigation hC={this.handleClick} state={this.state.btnState} vt={this.state.towers} vs={this.state.speed} soC={()=> this.handlesChange} toC={()=> this.handletChange}/>
                <div className="tower_of_hanoi">
                    {t}
                </div>
            </div>
        )
    }
}
var twr = ['tw1', 'tw2', 'tw3']

ReactDOM.render(
    <ToH />,
    document.getElementById('nav')
);
