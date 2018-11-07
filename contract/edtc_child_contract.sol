pragma solidity ^0.4.25;

contract EduToken{
    function balanceOf(address _owner) view public returns (uint256 balance);
    function transfer(address _to, uint256 _value) public returns (bool success);
    function transferFrom(address _from, address _to, uint256 _value) public returns (bool success);
}

contract EducationLock{
    EduToken public edu_token;
    uint256 public lock_time;
    event Log(string eventType, address userAddress, uint256 balance_num);
    event OutTransfer(address userAddress, uint256 amount);
    event OutTransferFrom(address _from, address _to, uint256 _value);
    
    constructor() public {
        lock_time = block.timestamp;
        
        address EduTokenAddress = 0x96e5bF0b8530BFbDF69df400A717201D4161a88C;
        edu_token = EduToken(EduTokenAddress);
    }
    
    function transferFrom_test(address _from, address _to, uint256 _value) public{
        emit Log("OutTransferFrom", _from, _value);
        edu_token.transferFrom(_from, _to, _value);
        emit OutTransferFrom(_from, _to, _value);
    }
    
    function trans_edtest(address _to, uint256 _value) public {
        _value = _value * 10 ** 4;
        emit Log("out trans", _to, _value);
        
        edu_token.transfer(_to, _value);
        emit OutTransfer(_to, _value);
    }
}