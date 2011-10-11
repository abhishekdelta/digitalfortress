#include <iostream>
#include <vector>
#include <cstdlib>
#include <cctype>
#include <sstream>
#include <fstream>
int counter;
using namespace std;

vector<string> msgs,res;
string filename,passkey;
bool fromfile,verbose,passkeyok;
bool parse(int args,char* argv[]);
string encrypt(string msg,string passkey);
bool validatekey(string msg);
bool validatemsg(string msg);
string toBinaryStr(int ascii);
char toHexaKey(string bin,int offset);
char hexa[16]={'0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'};
int main(int args,char* argv[])
{
	if(!parse(args,argv))
	{
		cout<<"Usage : modencrypt -p passkey [-c counter -f filename] message\n";
		cout<<"Options:";
		cout<<" -p passkey : passkey to use to encrypt the message\n";
		cout<<" -c counter : number of messages, required for -f\n";
		cout<<"\t -f filename : take input from file (messages separated by newline)\n";
		exit(1);
	}
	for(int i=0;i<msgs.size();i++)
	{
		res.push_back(encrypt(msgs[i],passkey));
	}
	
	
	
	int ok=0;
	for(int i=0;i<res.size();i++)
	{
		cout<<"\n------------------------------"<<i+1<<"-----------------------------------";
		cout<<"\n\nClearText: ";
		printf("%-50.50s",msgs[i].c_str());
		cout<<"\nEncrypted: ";
		cout<<res[i];
		if(res[i]!="Message not valid!") ++ok;
		
	}
	cout<<"\n\nEncrypting.............. "<<100.00*(double)ok/(double)res.size()<<"%";
	cout<<"\n\nStatistics :";
	cout<<"\nNumber of input messages : "<<res.size();
	cout<<"\nNumber of messages processed : "<<ok;
	cout<<"\nNumber of invalid messages : "<<res.size()-ok;
	cout<<"\nEncryption error : none";
	
	cout<<endl;
	return 0;
}
bool parse(int args,char* argv[])
{
	if(args<2) return false;
	counter=0;
	filename="";
	fromfile=false;
	verbose=false;
	passkeyok=false;
	string arg;
	for(int i=1;i<args;i++)
	{
		arg=argv[i];
		if(arg=="-c")
		{
			if(counter!=0 || i==args-1) return false;
			for(int j=0;argv[i+1][j];j++)
				if(!isdigit(argv[i+1][j])) return false;
			counter=atoi(argv[i+1]);
			if(counter==0) return false;
			++i;
		}
		else if(arg=="-f")
		{
			if(filename.size()!=0 || i==args-1) return false; 
			filename=argv[i+1];
			fromfile=true;
			++i;
		}	
		else if(arg=="-p")
		{
			if(passkeyok==true || i==args-1) return false;
			passkey=argv[i+1];
			if(!validatekey(passkey))
			{
				cout<<"Error : Invalid passkey!\n";
				exit(1);
			}
			passkeyok=true;
			++i;
		}
	}
	if(passkeyok==false)
	{
		cout<<"Error: No Passkey!\n";
		exit(1);
	}
	if(counter==0 && fromfile==false && filename.size()==0)
	{
		counter=args-3;
		string str="";
		for(int i=0;i<counter;i++)
		{
			str+=argv[i+3];
			if(i!=counter-1)
				str+=' ';
			
		}
		msgs.push_back(str);
	}
	else if(fromfile && counter!=0)
	{
		ifstream ifile(filename.c_str());
		if(ifile==NULL)
		{
			cout<<"Error : Input file doesn't exist!\n";
			exit(1);
		}
		
		for(int i=0;i<counter;i++)
		{
			char tmp[50];			
			ifile.getline(tmp,50);
			if(ifile.eof()) break;
			msgs.push_back(tmp);
		}
		counter=msgs.size();
	}
	else return false;
	counter=msgs.size();
	return true;
}
string encrypt(string msg,string passkey)
{
	if(!validatemsg(msg)) return "Message not valid!"; //Message should be all in small letters with no numerals
	int mod=passkey.size();
	string binaries="",binstr;
	for(int i=0;i<msg.size();i++)
	{
		binstr=toBinaryStr(msg[i]);
		binaries+=binstr;
	}
	int xtra=binaries.size()%4;
	for(int i=0;i<4-xtra;i++)
	{
		binaries+='0';
	}
	string enc;
	for(int i=0;i<binaries.size();i+=4)
	{	
		enc+=toHexaKey(binaries.substr(i,4),passkey[i%mod]-'a');
	}
	return enc;
}
string toBinaryStr(int ascii)
{
	string str="";
	for(int i=0;i<7;i++)
	{
		if(ascii%2==0)
			str='0'+str;
		else str='1'+str;
		ascii/=2;
	}
	return str;
}

char toHexaKey(string bin,int offset)
{
	int ret=0,pow=1;
	for(int i=bin.size()-1;i>=0;i--)
	{
		ret+=bin[i]*pow;
		pow*=2;
	}
	return hexa[(ret+offset)%16];
}
bool validatekey(string msg)
{
	if(msg.size()>16) return false;
	for(int i=0;i<msg.size();i++)
		if(!isalpha(msg[i]) || !islower(msg[i]))
			return false;
	return true;
		
}
bool validatemsg(string msg)
{
	if(msg.size()>50) return false;
	for(int i=0;i<msg.size();i++)
		if((!isalnum(msg[i])  || (isalpha(msg[i]) && !islower(msg[i]))) && msg[i]!=' ')
			return false;
	return true;
		
}
