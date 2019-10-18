package csinfo.carin.edu.BoggleGame;
//NOTE: Although this code is not debugged and currently will not perform a game of Boggle, I am submitting this assignment. I have invested many hours and have learned a lot from this project. 
//I am just ready to be done for the moment, when I am more experienced in Java I will come back and hopefully will be able to debug and fix in order to make this game work. 
//Much thanks to Professor Sabal for the many hours of help. 
import java.awt.*;
import java.awt.event.*;
import java.util.*;
import javax.swing.*;
import javax.swing.Timer;
// This class being the main class, sets up the JFrame and also sets up the board. It contains the GUI and Action Performed commands.  
public class GUIBoggle implements ActionListener {
	//GUI parts
	private JFrame frame;
	private JButton submitWord;
	private JButton start;
	//private JButton pause;
	private JButton exit;
	private JButton instructions;
	private JButton newWord;
	private JPanel guiGrid;
	private JButton[][] gridButtons;
	private JTextArea foundWordsSpace;
	private JTextArea guessWordSpace;
	private JLabel title;
	private JLabel scoreLabel;
	private JLabel messagesLabel;
	private JLabel TimerLabel;
	long gameStartTime = 0;
	Timer timer;
	private Dice dice;
	int wordPickCounter = 0;
	//Game parts
	private final int Board_size = 4 ; //Width and height of the grid
	private Grid g; //Instance of grid for the game
	private ArrayList<String> foundWords = new ArrayList<String>();// Words that the player has found
	private int score = 0; // Score of the player
	private int computerScore = 0; //Score for computer
	private String guess = " "; // Players current guess
	private int lastRow = -1; // the row of the last letter the player used
	private int lastColumn = -1; // the column of the last letter the player used
	private boolean [][] used; //
	//private GamerTimer t ; //
	private int foundWordsAmount = 0; //
	private boolean paused = false; // 
	public searchForWord computerSearch ;
    // Alphabet size
    static final int SIZE = 26;
      
    //static final int M = 4;
   // static final int N = 4;
	
	
	
	public void play() {
		//Create and set up the window
		frame = new JFrame ("Boggle");
		//Have the program be able to exit, when player clicks [x]
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
		dice = new Dice();
		dice.Shuffle();
		
		//Generate GUI Parts
		guiSetup(frame.getContentPane());
		
		//Display the window, with a set size.
		frame.setVisible(true);
		frame.setSize(800, 600);
		frame.setResizable(false);
		
		//Start timer
		//t.setTime();
		timer = new Timer(1000,this);
		timer.setActionCommand("Timer Start");
	}
	// The GUI is se up with all components
	public void guiSetup(Container pane) {
		// 3 containers, column one is small, main grid parts are in column two, found word parts are in column three, two and three take multiple spaces
		pane.setLayout(new GridBagLayout());
		GridBagConstraints c = new GridBagConstraints();
		c.weighty = 0.5;
		
		//First Column
		c.weightx = 0.25;
		c.gridx = 0;
		Font f = new Font("Sanserif", Font.ITALIC, 34);
		title = new JLabel("Boggle");
		title.setFont(f);
		c.gridy = 1;
		scoreLabel = new JLabel();
		pane.add(scoreLabel, c);
		
		TimerLabel = new JLabel("Timer: 3:00");
		TimerLabel.setFont(f);
		c.gridy = 2;
		pane.add(TimerLabel,  c);
		
		messagesLabel = new JLabel("Enter word: ");
		f = new Font("Serif", Font.PLAIN, 20);
		messagesLabel.setFont(f);
		f = new Font("Serif", Font.PLAIN, 24);
		c.gridy = 3;
		c.fill = GridBagConstraints.VERTICAL;
		pane.add(messagesLabel,  c);
		c.fill = GridBagConstraints.NONE;
		
		
		start = new JButton( "Start" );
		start.addActionListener(this);
		start.setActionCommand("start");
		c.gridy = 4;
		pane.add(start, c);
		
		instructions = new JButton ( "Instructions" );
		instructions.addActionListener( this );
		instructions.setActionCommand("instrucitons");
		
		c.gridy = 5;
		pane.add(instructions, c);
		
		exit = new JButton("Exit");
		exit.addActionListener(this);
		exit.setActionCommand("exit");
		c.gridy = 6;
		pane.add(exit,c);
		
		// Column two
		c.gridx = 1;
		c.weightx = 0.75;
		
		guiGrid = new JPanel(new GridLayout(Board_size, Board_size));
		gridButtons = new JButton[Board_size][Board_size];
		g = new Grid(Board_size);
		
		// Uses the shuffled letters from the Dice Class to set up a board of the desired size.
		for(int i = 0; i< Board_size; i++) {
			for (int j = 0; j < Board_size; j++) {
				gridButtons[i][j] = new JButton(Character.toString(g.charAt(i,j)));
				gridButtons[i][j].addActionListener(this);
				gridButtons[i][j].setFont(f);
				int which = i*Board_size+j;
				String letter = dice.getValue(which);
				gridButtons[i][j].setText(letter);
				guiGrid.add(gridButtons[i][j]);	
			}
		}
		
		c.gridx = 1;
		c.gridheight = 3;
		c.fill = GridBagConstraints.BOTH;
		c.gridy = 1;
		pane.add(guiGrid,  c);
		c.gridheight = 1;
		c.fill = GridBagConstraints.NONE;
		
		newWord = new JButton("New word");
		newWord.addActionListener(this);
		c.gridy = 5;
		pane.add(newWord, c);
	
		guessWordSpace = new JTextArea(1,1);
		guessWordSpace.setEditable(true);
		guessWordSpace.setBorder(BorderFactory.createEtchedBorder());
		
		c.gridy = 6;
		c.fill = GridBagConstraints.BOTH;
		pane.add(guessWordSpace, c);
		c.fill = GridBagConstraints.NONE;
		
		submitWord = new JButton("Submit word");
		submitWord.addActionListener(this);
		submitWord.setActionCommand("submitWord");
		
		c.gridx = 1;
		c.gridy = 7;
		pane.add(submitWord, c);
		
		//Column three
		c.gridx = 2;
		c.weightx = 0.25;
		
		JLabel foundTitle = new JLabel("Found words:");
		foundTitle.setFont(f);
		c.gridy = 1;
		pane.add(foundTitle, c);
		
		foundWordsSpace = new JTextArea(10,16);
		foundWordsSpace.setEditable(false);
		c.gridx = 2;
		c.gridy = 2;
		c.gridheight = 2;
		Insets in = new Insets(25,25,25,25);
		foundWordsSpace.setMargin(in);
		foundWordsSpace.setBorder(BorderFactory.createEtchedBorder());
		pane.add(foundWordsSpace,  c);	
	
		//Calls the computer player function to start the computers search for words(see method below, searchForWord Class)
		computerSearch= new searchForWord(gridButtons);
	}
	
	//Player interacts with a GUI Component, otherwise known as the Actions Performed.
	public void actionPerformed (ActionEvent m) {
	// Starts the game by starting the count down timer.
	String cmd = m.getActionCommand();
	if(cmd.equalsIgnoreCase("start")) {
		gameStartTime = System.currentTimeMillis();
		System.out.println(gameStartTime);
		timer.start();
	}// End of if
	//Timer is set up and started when the start button is clicked. The timer also is set up to count down and not up. When finished the submit box no longer accepts input and the calculateScore method is called.
	if(cmd.equalsIgnoreCase("Timer Start")) {
		long timeLeft = 180-((System.currentTimeMillis()- gameStartTime)/1000);
		TimerLabel.setText(String.format("Timer: %d:%02d",((int)timeLeft/60),(timeLeft%60)));
		long playingTime = System.currentTimeMillis()- gameStartTime;
		timeLeft = 180000 - playingTime;
		long min =timeLeft / 60000;
		long sec = (timeLeft -(min*60000))/1000L;
		if(timeLeft <=0 ) {
			submitWord.setEnabled(false);
			timer.stop();
			calculateScores (); 
		}
	}//End of second if
	
	if(cmd.equalsIgnoreCase("exit")) {
		//Exit the application
		System.exit(0);
	}// End of if	
	
	
	if(cmd.equalsIgnoreCase("submitWord")) {
	ArrayList<String> foundWords = new ArrayList<String>();
		if(!foundWords.contains(guess)) {
			foundWords.add(guess);
			foundWordsSpace.append(guess);
			wordPickCounter++;
			//Computer may only guess after user guesses twice, therefore making the computer less efficient.
				if (wordPickCounter%2 == 0)
					computerGuess();
		}	
	// Always set the word to blank when the press submit word
	removeWord();
	}
	if(cmd.equalsIgnoreCase("newWord")) {
		removeWord();
	}
	//Instructions are given if the user clicks on the Instruction Button. 
	if(cmd.equalsIgnoreCase("Instructions")) {
		JOptionPane.showMessageDialog( frame, "Welcome to Boggle! Players have three minutes (shown by the countdown timer) to find as many words as they can in the grid, according to the following rules:\r\n" + 
				"\r\n" + 
				"The letters must be adjoining in a 'chain'. (Letter cubes in the chain may be adjacent horizontally, vertically, or diagonally.)\r\n" + 
				"Words must contain at least three letters.\r\n" + 
				"No letter cube may be used more than once within a single word.\r\n" + 
				"Type your words into the box below the grid. You can put each word on a new line or separate the words with spaces or commas. It does not matter whether you use upper or lower case letters.\r\n" + 
				"\r\n" + 
				"When the time is up, your words will be submitted automatically and your score calculated");
	}
	
		
} //End of actionPerformed
	
	// Calculates the player and computers scores by comparing their found words from their Array lists.
	private void calculateScores() {
		ArrayList<String>computerWords = computerSearch.getComputerWords();
		for (String word : computerWords) {
			if(! foundWords.contains(word))computerScore ++;
		}
		for (String word: foundWords) {
			if(! computerWords.contains(word))score ++;
		}
		if(computerScore > score) {
			JOptionPane.showMessageDialog(null, "Computer Wins! Better Luck Next Time.");
		}
		if(score > computerScore) {
			JOptionPane.showMessageDialog(null, "You Wins! Congratulations.");
		}
	}
	//Removing the guessed word from the input box, so the user does not have to backspace every time for every word they input.
	public void removeWord() {
	lastRow = -1;
	lastColumn = -1;
	guess = " ";
	guessWordSpace.setText(" ");
	//Change background color of the buttons on the page
	for(int i=0;i<Board_size; i++) {
		
		for(int j=0; j<Board_size; j++) {
			
			gridButtons[i][j].setBackground(start.getBackground());// Reset button will always have the default color
			
		}
	}
}
	//Checks for words inputed twice by player
	public Boolean exists (String s) {
		 
		for(String str : foundWords)
			if(s.equals(str))
				return true;
		
		return false;
	}
	// The computer searchForWord is called here so the computer player will find words. 
	// The computer needs to be made less effective so the user could potentially win the game. 
	public void computerGuess() {
	 computerSearch.contains();
	 
		
	}
	// Calls play method.
	public static void main(String args[]) {
		GUIBoggle boggle = new GUIBoggle();
		boggle.play();
	}



	}//this is the end....... curly brace that is. ( note that not all curly braces are commented, just the ones that are confusing)












