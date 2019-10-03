var _ = 'underscore'
class Tower1 extends React.Component{
    render() {
        return(
            <input type="text" name="t1" id="t1" value={this.props.t1} readOnly/>
        );
    }
}
class Tower2 extends React.Component{
    render() {
        return(
            <input type="text" name="t2" id="t2" value={this.props.t2} readOnly/>
        );
    }
}
class Tower3 extends React.Component{
    render() {
        return(
            <input type="text" name="t3" id="t3" value={this.props.t3} readOnly/>
        );
    }
}
class Play extends React.Component{
    render() {
        return(
            <button type="submit" onClick={()=>this.props.oC()}>{this.props.state}</button>
        )
    }
}
class App extends React.Component{
    constructor(props){
        super(props)
        this.state={
            tw1: Array(5).fill(null),
            tw2: Array(),
            tw3: Array(),
            btn: 'Play',
            t: false,
        }
        this.fill = this.fill.bind(this);
    }
    fill=()=>{
        let m = [1, 2, 3, 4, 5]
        for(var i = 1; i <= 5; i++){
            this.state.tw1.pop();
        }
        for(var i = 1; i < 6; i++){
            this.state.tw1.push(m[i-1]);
        }
    }
    next(){
        clearInterval(this.t)           
    }
    move = ()=>{
        this.state.tw3.push(this.state.tw1.pop())
    }
    play () {
        this.move();
        var btn = this.state.t;
        this.t = setInterval(()=>{
                if(btn){
                    this.next();
                }else {
                    this.setState({t:true})
                    this.play();
                }
        }, 1000)
    }
    handleC = () => {
        if(this.state.btn == 'Play'){
            this.setState({btn: 'Pause'})
            this.setState({t:true})
            this.play();
        }
        else
            this.setState({btn: 'Play'})
    }
    render(){
        this.fill();
        return(
            <div className="towers">
                <Play state={this.state.btn} oC={this.handleC}/>
                <p>
                    <Tower1 t1={this.state.tw1}/>
                </p>
                <p>
                    <Tower2 t2={this.state.tw2}/>
                </p>
                <p>
                    <Tower3 t3={this.state.tw3}/>
                </p>
            </div>
        );
    }
}
const TOWERS_NUMBER = 3;
const discColours = [
  'gray',
  'red',
  'green',
  'cyan',
  'yellow',
  'orange',
  'magenta',
  'blue',
];

const Disc = ({size, topDisc, startDrag}) => {
  const discWidth = (size + 1.5) * 25;
  const discStyle = {
    width: discWidth + 'px',
    backgroundColor: discColours[size % 8],
  };

  return (
    <div
      className='disc'
      style={discStyle}
      draggable={topDisc}
      onDragStart={startDrag}
    >
      <span className='disc-label'>
        {size}
      </span>
    </div>
  );
}

const Tower = ({towerDiscs, maxSize, startTopDiscDrag, dropDisc}) => {
  const towerStyle = {width: (maxSize + 3) * 25};
  const pillarStyle = {height: 100 + maxSize * 20};

  return (
    <div
      className='tower'
      style={towerStyle}
      onDragOver={(e) => {e.preventDefault()}}
      onDrop={dropDisc}
    >
      <div className='tower-pillar' style={pillarStyle} />
      <div className='tower-base' />
      <div className='disc-group'>
        {towerDiscs.map((size, i) =>
          <Disc
            key={size.toString()}
            size={size}
            topDisc={i===0}
            startDrag={startTopDiscDrag}
          />
        )}
      </div>
    </div>
  );
};

class Towers extends React.Component {
  constructor(props) {
    super(props);
    let startTower = _.range(1, this.props.discsNumber + 1);
    let discs = _.map(Array(TOWERS_NUMBER), (val, i) =>
      i === 0 ? startTower : []
    );
    this.state = {discs};
  }

  startTopDiscDrag(activeTower) {
    this.activeTower = activeTower;
  }

  dropDisc(destTower) {
    const sourceTower = this.activeTower;
    this.activeTower = null;
    if (sourceTower === destTower || sourceTower === null) return;

    this.setState((state) => {
      const disc = state.discs[sourceTower][0];
      if (state.discs[destTower][0] < disc) return state;

      let discs = [...state.discs];
      discs[sourceTower] = _.tail(discs[sourceTower]);
      discs[destTower] = [disc, ...state.discs[destTower]];
      return {discs};
    });
  }

  render() {
    return (
      <div>
        {this.state.discs.map((towerDiscs, i) =>
          <Tower
            key={i+1}
            towerDiscs={towerDiscs}
            maxSize={this.props.discsNumber}
            startTopDiscDrag={() => this.startTopDiscDrag(i)}
            dropDisc={() => this.dropDisc(i)}
          />
        )}
      </div>
    );
  }
}
ReactDOM.render(
    <Towers />,
    document.getElementById('root')
);