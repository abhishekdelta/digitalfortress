#include <iostream>
#include <vector>
#include <cstdlib>
#include <cctype>
#include <sstream>
#include <fstream>
using namespace std;
int count;
vector<string> msgs,res;
string filename;
bool fromfile,verbose;
bool parse(int args,char* argv[]);
string encrypt(string msg);
bool validate(string msg);
void rippleAdd(int i,int c,vector<int>& ascii,vector<int>& hint,bool flag);
int main(int args,char* argv[])
{
	if(!parse(args,argv))
	{
		cout<<"Usage : encrypt [-c count -f filename] message1 [message2 [message3 ... ]]\n";
		cout<<"Options:";
		cout<<" -c count : number of messages, required for -f\n";
		cout<<"\t -f filename : take input from file (messages separated by newline)\n";
		cout<<"\t -v : verbose\n";
		exit(1);
	}
	for(int i=0;i<msgs.size();i++)
	{
		res.push_back(encrypt(msgs[i]));
	}
	
	cout<<"\nClearText\t\tEncryptedMessage";
	cout<<"\n------------------------------------------------------------------";
	int ok=0;
	for(int i=0;i<res.size();i++)
	{
		printf("\n%-16.16s\t%s",msgs[i].c_str(),res[i].c_str());
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
	count=0;
	filename="";
	fromfile=false;
	verbose=false;
	string arg;
	for(int i=1;i<args;i++)
	{
		arg=argv[i];
		if(arg=="-v")
		{
			if(verbose==true) return false; //Means this is the second time
			verbose=true;
		}
		else if(arg=="-c")
		{
			if(count!=0 || i==args-1) return false;
			for(int j=0;argv[i+1][j];j++)
				if(!isdigit(argv[i+1][j])) return false;
			count=atoi(argv[i+1]);
			if(count==0) return false;
			++i;
		}
		else if(arg=="-f")
		{
			if(filename.size()!=0 || i==args-1) return false; 
			filename=argv[i+1];
			fromfile=true;
			++i;
		}	
	}
	if(count==0 && fromfile==false && filename.size()==0)
	{
		count=args-1;
		for(int i=0;i<count;i++)
			msgs.push_back(argv[i+1]);
	}
	else if(fromfile && count!=0)
	{
		ifstream ifile(filename.c_str());
		if(ifile==NULL)
		{
			cout<<"Error : Input file doesn't exist!\n";
			exit(1);
		}
		
		for(int i=0;i<count;i++)
		{
			char tmp[100];			
			ifile>>tmp;
			if(ifile.eof()) break;
			msgs.push_back(tmp);
		}
		count=msgs.size();
	}
	else return false;
	count=msgs.size();
	return true;
}
string encrypt(string msg)
{
	if(!validate(msg)) return "Message not valid!"; //Message should be all in small letters with no numerals
	
	vector<int> ascii;
	vector<int> hint;
	bool flag=false;
	for(int i=0;i<msg.size();i++)
	{
		if(i==0)
		{
			ascii.push_back(msg[i]-'a'+1);
			hint.push_back(0);
			if((msg[i]-'a'+1)>9)
			{
				hint.push_back(0); flag=true;
			}
			continue;
		}		
		else if(msg[i]-'a'+1>9)
			rippleAdd(i,(msg[i]-'a'+1)/10,ascii,hint,flag);

		ascii.push_back((msg[i]-'a'+1)%10);
		hint.push_back(0);
		
	
	}
	ostringstream str;
	for(int i=0;i<ascii.size();i++)
		str<<ascii[i];
	str<<"-";
	for(int i=0;i<hint.size();i++)
		str<<hint[i];
	
	return str.str();
}
void rippleAdd(int i,int c,vector<int>& ascii,vector<int>& hint,bool flag)
{
	if(c && i)
	{
		ascii[i-1]+=c;
		if(!flag) hint[i-1]+=min(ascii[i-1],c);
		else hint[i]+=min(ascii[i-1],c);
		rippleAdd(i-1,ascii[i-1]/10,ascii,hint,flag);
	}		
}
bool validate(string msg)
{
	if(msg.size()>16) return false;
	for(int i=0;i<msg.size();i++)
		if(!isalpha(msg[i]) || !islower(msg[i]))
			return false;
	return true;
		
}
